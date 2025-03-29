const webcamElement = document.getElementById('webcam');
const webcam = new Webcam(webcamElement, 'user');
const modelPath = 'models'; // Ensure models are correctly located in this path
let displaySize;
let faceDetection;
let faceDetected = false;

$(document).ready(function () {
  startWebcamAndFaceDetection();
});

// Automatically start webcam and face detection
function startWebcamAndFaceDetection() {
  // Start the webcam and initialize face detection
  webcam.start()
    .then(result => {
      console.log('Webcam started');
      cameraStarted();
      $("#webcam-switch").prop("checked", true); // Ensure webcam is enabled
      $("#detection-switch").prop("checked", true); // Enable face detection automatically
      $("#box-switch").prop("checked", false); // Disable bounding box
      $("#landmarks-switch").prop("checked", false); // Disable landmarks
      $("#age-gender-switch").prop("checked", false); // Disable age and gender
      $("#expression-switch").prop("checked", false); // Disable expression

      // Set displaySize based on webcam video element once it has valid dimensions
      webcamElement.onloadedmetadata = () => {
        displaySize = { width: webcamElement.videoWidth, height: webcamElement.videoHeight };
        console.log("Webcam dimensions:", displaySize);
        createCanvas();
        // Load the face-api.js models and start face detection
        $(".loading").removeClass('d-none');
        Promise.all([
          faceapi.nets.tinyFaceDetector.load(modelPath),
          faceapi.nets.faceLandmark68TinyNet.load(modelPath),
          faceapi.nets.faceExpressionNet.load(modelPath),
          faceapi.nets.ageGenderNet.load(modelPath)
        ]).then(function () {
          $(".loading").addClass('d-none'); // Hide the loading animation once models are loaded
          console.log("Models loaded successfully!");
          startDetection();
        }).catch(err => {
          $(".loading").addClass('d-none');
          console.error("Error loading models:", err);
          alert("Error loading face detection models. Please check the console for details.");
        });
      };
    })
    .catch(err => {
      displayError(err);
    });
}

function createCanvas() {
  if (document.getElementsByTagName("canvas").length == 0) {
    canvas = faceapi.createCanvasFromMedia(webcamElement);
    document.getElementById('webcam-container').append(canvas);

    // Ensure canvas matches video element's dimensions
    canvas.width = displaySize.width;
    canvas.height = displaySize.height;

    // Position the canvas over the webcam video element
    canvas.style.position = "absolute";
    canvas.style.top = "0";
    canvas.style.left = "0";

    // Ensure canvas dimensions are synced with video
    faceapi.matchDimensions(canvas, displaySize); // Match canvas with the display size of the video element
  }
}

function startDetection() {
  faceDetection = setInterval(async () => {
    // Check the video size before proceeding with detection
    if (!displaySize.width || !displaySize.height) {
      console.log("Waiting for valid dimensions...");
      return;
    }

    // Detect faces
    const detections = await faceapi.detectAllFaces(webcamElement, new faceapi.TinyFaceDetectorOptions());

    // If faces are detected and no popup has been triggered yet, show the popup after a delay
    if (detections.length > 0 && !faceDetected) {
      faceDetected = true;
      setTimeout(() => {
        alert("Face detected! Face Verification Successful.");
         window.location.href = "../home_user.php";
      }, 3000); // 3 seconds delay before showing the popup
    }

    // If no face is detected, reset faceDetected flag
    if (detections.length === 0 && faceDetected) {
      faceDetected = false;
    }

    if (!$(".loading").hasClass('d-none')) {
      $(".loading").addClass('d-none');
    }
  }, 300); // Detect every 300ms
}

function cameraStarted() {
  toggleContrl("detection-switch", true);
  $("#errorMsg").addClass("d-none");
  if (webcam.webcamList.length > 1) {
    $("#cameraFlip").removeClass('d-none');
  }
}

function cameraStopped() {
  toggleContrl("detection-switch", false);
  $("#errorMsg").addClass("d-none");
  $("#cameraFlip").addClass('d-none');
}

function displayError(err = '') {
  if (err != '') {
    $("#errorMsg").html(err);
  }
  $("#errorMsg").removeClass("d-none");
}

function toggleContrl(id, show) {
  if (show) {
    $("#" + id).prop('disabled', false);
    $("#" + id).parent().removeClass('disabled');
  } else {
    $("#" + id).prop('checked', false).change();
    $("#" + id).prop('disabled', true);
    $("#" + id).parent().addClass('disabled');
  }
}
