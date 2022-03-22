<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/timeline.css">
    <title>Oliver Schlüter</title>
</head>
<body>
    <div>
        <header>
            <div class="bgCode"></div>
            <ul class="nav">
                <li><a onclick="myScrollTo('aboutMe')">Über Mich</a></li>
                <li><a onclick="myScrollTo('projects')">Projekte</a></li>
                <li><a href="https://github.com/OliverSchlueter" target="_blank">GitHub</a></li>
            </ul>
            <h1 class="headline">Oliver Schlüter</h1>
            <h2 class="subtitle">Angehender Informationstechnischer Assistent</h2>
        </header>
        
        <h1 id="aboutMe">Über mich</h1>
        <h2>Persönliche Daten</h2>
        <table class="aboutMeTable">
            <tr>
                <td>Name</td>
                <td>Oliver Schlüter</td>
            </tr>
            <tr>
                <td>Geb.</td>
                <td>13.03.2003</td>
            </tr>
            <tr>
                <td>Alter</td>
                <td><span id="myAge" title="Ich weiß nicht, warum ich das gemacht habe">19 Jahre</span></td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td>oliver_schlueter@hotmail.com</td>
            </tr>
            <tr>
                <td>GitHub</td>
                <td><a href="https://github.com/OliverSchlueter" target="_blank">GitHub.com/OliverSchlueter</a></td>
            </tr>
        </table>

        <hr class="short">

        <h2>Schulische Laufbahn</h2>

        <div class="timeline-container">
            <div class="point">
                <p class="date">2021 - 2022</p>
                <p class="txt">Schülerstudium<br>Modul: "Grundlagen der Programmierung"</p>
            </div>
            <div class="point">
                <p class="date">2020 - 2023</p>
                <p class="txt">Fachhochschulreife<br> + Informationstechnischer Assisent</p>
            </div>
            <div class="point">
                <p class="date">2014 - 2020</p>
                <p class="txt">Realschule</p>
            </div>
            <div class="point">
                <p class="date">2009 - 2014</p>
                <p class="txt">Grundschule</p>
            </div>
        </div>

        <hr class="short">

        <h2>Kenntnisse</h2>
        <div class="skills">
            <div class="skill" style="--skill-percentage: 80%">Java</div>
            <div class="skill" style="--skill-percentage: 60%">C#</div>
            <div class="skill" style="--skill-percentage: 57%">SQL (MySQL)</div>
            <div class="skill" style="--skill-percentage: 55%">PHP</div>
            <div class="skill" style="--skill-percentage: 50%">HTML</div>
            <div class="skill" style="--skill-percentage: 45%">CSS</div>
            <div class="skill" style="--skill-percentage: 38%">Git (GitHub)</div>
            <div class="skill" style="--skill-percentage: 30%">Python</div>
            <div class="skill" style="--skill-percentage: 26%">JavaScript</div>
        </div>

        <br>
        <hr>

        <h1 id="projects">Meine Projekte</h1>
        <div class="projects">
            <div class="project">
                <p class="name">Portfolio<a class="githubref" href="https://github.com/OliverSchlueter/Portfolio" target="_blank">GitHub</a></p>
                <p class="technology">PHP, JavaScript, HTML, CSS</p>
                <p class="description">Dies ist eine Website, welche mein Portfolio sein soll. Es wurde mehr wert auf Design gelegt, als sonst.</p>
            </div>
            <div class="project">
                <p class="name">Java-- (Compiler)<a class="githubref" href="https://github.com/OliverSchlueter/JavaMM" target="_blank">GitHub</a></p>
                <p class="technology">Java, Maven</p>
                <p class="description">Java-- is a personal project. I called it Java--, because I (obviously) like Java and I also like the reason why C++ is called C++ but actually my compiler is bad so I called it Java--.</p>
            </div>
            <div class="project">
                <p class="name">ThisCord<a class="githubref" href="https://github.com/OliverSchlueter/ThisCordServer" target="_blank">GitHub</a></p>
                <p class="technology">Java, MySQL; PHP, JavaScript, HTML, CSS</p>
                <p class="description">ThisCord ist ein standart Messenger, wo man anderen Nachrichten senden kann. Mein Lernziel, war, Websockets kennzulernen.</p>
            </div>

        </div>
    </div>
    <script src="assets/js/main.js"></script>
</body>
</html>