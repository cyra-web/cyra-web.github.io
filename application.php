<?php
// Start output buffering
ob_start();

// Check if the appID parameter exists in the query string
if (isset($_GET['appID']) && !empty($_GET['appID'])) {
    $appID = htmlspecialchars($_GET['appID']); // Sanitize the input
    $file = 'applications/' . $appID . '.html'; // Build the path to the application inside the 'applications' folder

    // Redirect logic
    if (file_exists($file)) {
        header("Location: $file");
        exit();
    } else {
        // Display error message if file does not exist
        echo "<p>Error 404: Application ID not found</p>";
        exit();
    }
} else {
    // Display error message if appID is not provided
    echo "<p>Error 404: No appID provided</p>";
    exit();
}

// Flush output buffer
ob_end_flush();
?>
