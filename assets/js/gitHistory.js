const commitTimelineElement = document.getElementById("commit-timeline");

const formattedDate = (iso8601) => {
    const date = new Date(iso8601);
    return date.toLocaleDateString();
}

const addCommit = (sha, date, description, author) => {
    const commitElement = document.createElement("div");
    commitElement.className = "point";

    const headerElement = document.createElement("p");
    headerElement.className = "date";

    const shaElement = document.createElement("a");
    shaElement.href = "https://github.com/OliverSchlueter/Portfolio/commit/" + sha;
    shaElement.target = "_blank";
    shaElement.className = "courier_new";
    shaElement.style.color = "var(--light-orange)";
    shaElement.innerText = "[" + sha.substring(0, 7) + "]";

    const dateElement = document.createElement("span");
    dateElement.style.marginLeft = "10px";
    dateElement.style.color = "gray";
    dateElement.innerText = formattedDate(date);

    const authorElement = document.createElement("span");
    authorElement.style.color = "var(--orange)";
    authorElement.style.float = "right";
    authorElement.innerText = author;

    headerElement.appendChild(shaElement);
    headerElement.appendChild(dateElement);
    headerElement.appendChild(authorElement);

    const descriptionElement = document.createElement("p");
    descriptionElement.className ="txt";
    descriptionElement.innerText = description;

    commitElement.appendChild(headerElement);
    commitElement.appendChild(descriptionElement);

    commitTimelineElement.appendChild(commitElement);
}

const fetchCommits = async () => {
    const response = await fetch('https://api.github.com/repos/OliverSchlueter/Portfolio/commits');
    const json = await response.json();
    
    for (let i = 0; i < 30; i++) {
        const sha = json[i].sha;
        const date = json[i].commit.author.date;
        const description = json[i].commit.message;
        const author = json[i].commit.author.name;
        
        addCommit(sha, date, description, author);
    }

}

fetchCommits();