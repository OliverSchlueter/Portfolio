<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Oliver Schlüter | Git History</title>
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/timeline.css">
    <link rel="stylesheet" href="../assets/css/snackbar.css">
</head>
<body>
    <?php
        $apiLink = "https://api.github.com/repos/OliverSchlueter/";
        $repoName = "";

        if(isset($_GET['repo'])){
            $apiLink .= $_GET['repo'];
            $repoName = $_GET['repo'];
        } else {
            $apiLink .= "Portfolio";
            $repoName = "Portfolio";
        }

        echo "<script>
                const apiLink = '$apiLink';
                const repoName = '$repoName';        
        </script>";

    ?>
    <main>
        <h1>Git History</h1>
        <h2>Die letzten Commits von <span class="highlight_red"><?= $repoName ?></span></h2>

        <div class="commits">
            <div class="timeline-container" id="commit-timeline"></div>
        </div>
        
    </main>
    
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/gitHistory.js"></script>
    <script src="../assets/js/snackbar.js"></script>
</body>
</html>