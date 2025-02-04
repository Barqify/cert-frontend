<?php
// Get the current post ID
$post_id = get_the_ID();

// Retrieve meta box values
$student_name    = get_post_meta($post_id, '_student_name', true);
$student_degree  = get_post_meta($post_id, '_student_degree', true);
$course_name     = get_post_meta($post_id, '_course_name', true);
$course_hours    = get_post_meta($post_id, '_course_hours', true);
$certificate_date = get_post_meta($post_id, '_certificate_date', true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CAMBRIDGE COLLEGE certificate - <?php echo esc_html($student_name) ?></title>
  <style>
      @import url("https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap");
      html {
        --red: #822123;
      }
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        font-family: "Cairo", sans-serif;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        min-height: 100vh;
        padding: 1rem;
      }
      .cert {
        padding: 24px;
      }
      .head-text {
        margin-bottom: 4rem;
      }
      .w-1\/2 {
        max-width: 800px;
        width: 100%;
      }
      .w-full {
        width: 100%;
      }
      .h-full {
        height: 100%;
      }
      .border {
        border: 6px solid var(--red);
      }
      .border-2 {
        border-width: 2px;
      }
      .p-2 {
        padding: 0.5rem;
      }
      .p-4 {
        padding: 1rem;
      }
      .pb-4 {
        padding-bottom: 0.5rem;
      }
      .relative {
        position: relative;
      }
      .absolute {
        position: absolute;
      }
      .top-0 {
        top: 0;
      }
      .left-0 {
        left: 0;
      }
      .bottom-0 {
        bottom: 0;
      }
      .right-0 {
        right: 0;
      }
      .flex {
        display: flex;
      }
      .flex-col {
        flex-direction: column;
      }
      .justify-center {
        justify-content: center;
      }
      .justify-between {
        justify-content: space-between;
      }
      .items-center {
        align-items: center;
      }
      .items-end {
        align-items: end;
      }
      .gap-4 {
        gap: 1rem;
      }
      .text-3xl {
        font-size: 2.5rem;
        font-weight: 400;
      }
      .text-2xl {
        font-size: 2rem;
        font-weight: 700;
      }
      .text-xl {
        font-size: 1.7rem;
        font-weight: 500;
      }
      .text-base {
        font-size: 1.2rem;
        font-weight: 500;
      }
      .text-center {
        text-align: center;
      }
      .text-red {
        color: var(--red);
      }
      .triangle-top-left,
      .triangle-top-right,
      .triangle-bottom-left,
      .triangle-bottom-right {
        border-style: solid;
      }

      .triangle-top-left {
        top: 0px;
        left: 0px;
        border-width: 31px 35px 0 0;
        border-top-color: var(--red);
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: transparent;
      }

      .triangle-top-right {
        top: 0px;
        right: 0px;
        border-width: 0 35px 31px 0;
        border-top-color: transparent;
        border-right-color: var(--red);
        border-bottom-color: transparent;
        border-left-color: transparent;
      }

      .triangle-bottom-left {
        bottom: 0px;
        left: 0px;
        border-width: 31px 0 0 35px;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: var(--red);
      }

      .triangle-bottom-right {
        bottom: 0px;
        right: 0px;
        border-width: 0 0 35px 35px;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: var(--red);
        border-left-color: transparent;
      }
      .stamps {
        display: flex;
        justify-content: space-between;
        align-items: end;
        gap: 1rem;
      }
      #print-btn {
        background-color: #822123; /* Main color */
        border: none; /* Remove borders */
        color: white; /* White text */
        text-align: center; /* Center text */
        text-decoration: none; /* Remove underline */
        display: inline-block; /* Make it inline */
        font-size: 16px; /* Font size */
        font-weight: bold; /* Bold text */
        border-radius: 8px; /* Rounded corners */
        cursor: pointer; /* Pointer cursor on hover */
        transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transitions */
      }

      #print-btn:hover {
        background-color: #6b1a1c; /* Darker shade of main color on hover */
        transform: scale(1.05); /* Slightly enlarge on hover */
      }

      #print-btn:active {
        background-color: #541416; /* Even darker shade on click */
        transform: scale(0.95); /* Slightly shrink on click */
      }

      #print-btn:focus {
        outline: none; /* Remove default focus outline */
        box-shadow: 0 0 0 3px rgba(130, 33, 35, 0.5); /* Custom focus outline using main color */
      }
      @media print {
        @page {
          size: A4; /* Set paper size to A4 */
          margin: 0; /* Remove margins */
        }
        .cert {
          height: 100vh;
        }
        body {
          margin: 0 !important; /* Ensure no extra margin is added by the body */
          padding: 0 !important; /* Ensure no extra padding is added by the body */
        }

        /* Optional: Hide unnecessary elements when printing */
        .no-print {
          display: none;
        }
        #print-btn {
          height: 0;
          display: none;
        }
        .stamps {
          flex-direction: row !important;
          height: 100%;
        }
      }
      @media (max-width: 768px) {
        .w-1\/2 {
          max-width: 100%;
        }
        .stamps {
          flex-direction: column;
          align-items: center;
        }
        .text-3xl {
          font-size: 2rem;
        }
        .text-2xl {
          font-size: 1.8rem;
        }
        .text-xl {
          font-size: 1.5rem;
        }
      }
    </style>
</head>
<body>
  <div class="cert border w-1/2 h-full p-4">
      <div
        class="relative border p-4 relative h-full border-2 flex flex-col gap-4 text-center"
      >
        <img
          class="absolute"
          style="
            max-width: 500px;
            width: 100%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
            opacity: 10%;
          "
          src="<?php echo plugin_dir_url(__FILE__); ?>../assets/img/ketm/Rubber_stamp1.svg"
          alt=""
        />
        <div class="absolute triangle-top-left"></div>
        <div class="absolute triangle-top-right"></div>
        <div class="absolute triangle-bottom-left"></div>
        <div class="absolute triangle-bottom-right"></div>

        <h1 class="text-3xl text-center text-red head-text">CAMBRIDGE COLLEGE</h1>
        <div class="flex justify-center">
          <img style="width: 100%; height: 150px" src="<?php echo plugin_dir_url(__FILE__); ?>../assets/img/ketm/logo1.svg" alt="logo" />
        </div>
        <div class="flex flex-col items-center">
          <p class="text-xl">Cambridge For Postgraduate</p>
          <p class="text-xl">Researches Diploma</p>
          <p class="text-xl text-red">In <?php echo esc_html($course_name) ?></p>
          <p class="text-xl">Granted to</p>
          <p class="text-2xl text-red"><?php echo esc_html($student_name) ?></p>
          <p class="text-base text-center">
            This is to certify that the above mentioned has Successfully<br>
            achieved The training diploma professional With all the rights<br> and
            the privileges of the certificate.
          </p>
          <p class="text-base p-4">
            This certificate has been given from Cambridge college
          </p>
          <p class="text-base">Hours : <?php echo esc_html($course_hours) ?> credit hours</p>
          <p class="text-base">Grade : <?php echo esc_html($student_degree) ?></p>
          <p class="text-base">This result was approved on <?php echo esc_html($certificate_date) ?></p>
        </div>

        <div class="stamps w-full pb-4 mb-4">
          <img
            style="height: 100px; width: auto"
            src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
            alt=""
          />
          <img
            style="height: 140px; width: auto"
            src="<?php echo plugin_dir_url(__FILE__); ?>../assets/img/ketm/Rubber_stamp1.svg"
            alt=""
          />
          <div>
            <img
            src="<?php echo plugin_dir_url(__FILE__); ?>../assets/img/ketm/Rubber_stamp2.png"
            alt=""
            />
            <p style="border-top: 1px solid #000" class="p-2 text-center">
              Registrar
            </p>
          </div>
        </div>
      </div>
    </div>
    <button id="print-btn" class="p-4">print as pdf</button>
    <script>
    // Disable right-click, text selection, and keyboard shortcuts
    document.addEventListener('contextmenu', function (e) {
      e.preventDefault();
    });
    document.addEventListener('selectstart', function (e) {
      e.preventDefault();
    });
    document.addEventListener('keydown', function (e) {
      if (e.ctrlKey && (e.key === 'c' || e.key === 'u' || e.key === 's')) {
        e.preventDefault();
      }
    });


    // Print as PDF functionality
    document.getElementById('print-btn').addEventListener('click', function () {
      window.print(); // Trigger the browser's print dialog
    });
  </script>
  </body>

</html>