const inputYear = document.getElementById("year");
const teamsList = document.querySelector(".teamsList");
const driversList = document.querySelector(".driversList");
const teamsPerPage = 3;
const driversPerPage = 2;
let currentPageTeam = 0;
let currentPageDriver = 0;
let teamsDatas = [];
let driversDatas = [];

async function fetchTeamDatas() {

    let year = inputYear.value
    if (!year.match(/^[0-9]{4}$/))
        return;
    try {
        const url = `https://api-formula-1.p.rapidapi.com/rankings/teams?season=${inputYear.value}`;
        const options = {
            method: 'GET',
            headers: {
                'X-RapidAPI-Key': '', //Mettre la clé API
                'X-RapidAPI-Host': 'api-formula-1.p.rapidapi.com'
            }
        };
        const response = await fetch(url, options);
        const { response: responseData } = await response.json();
        teamsDatas = responseData;
        renderTeamsList();
    } catch (error) {
        console.error(error);
    }
}

inputYear.addEventListener("input", fetchTeamDatas);

const renderTeamsList = () => {
    teamsList.innerHTML = "";
    const startIndex = currentPageTeam * teamsPerPage;
    const endIndex = startIndex + teamsPerPage;
    const teamsToDisplay = teamsDatas.slice(startIndex, endIndex);
    teamsToDisplay.forEach(team => {
        const li = document.createElement('li');
        const pPos = document.createElement('p');
        const pTeamName = document.createElement('p');
        const pPoints = document.createElement('p');

        pPos.textContent = "Position de l'équipe : " + team.position;
        pTeamName.textContent = "Nom de l'équipe : " + team.team.name;
        pPoints.textContent = "Points gagnés : " + team.points;

        li.appendChild(pPos);
        li.appendChild(pTeamName);
        li.appendChild(pPoints);
        li.classList.add("teamsLi-content");

        teamsList.appendChild(li);
        const totalPages = Math.ceil(teamsDatas.length / teamsPerPage);
        document.getElementById('teamPageNumber').textContent = `Page ${currentPageTeam + 1}/${totalPages}`;
    });
}

async function fetchDriversDatas() {

    let year = inputYear.value
    if (!year.match(/^[0-9]{4}$/))
        return;

    try {
        const url = `https://api-formula-1.p.rapidapi.com/rankings/drivers?season=${inputYear.value}`;
        const options = {
            method: 'GET',
            headers: {
                'X-RapidAPI-Key': '', // Mettre la clé API
                'X-RapidAPI-Host': 'api-formula-1.p.rapidapi.com'
            }
        };
        const response = await fetch(url, options);
        const { response: responseData } = await response.json();
        driversDatas = responseData;
        renderDriversList();

    } catch (error) {
        console.error(error);
    }
}

inputYear.addEventListener("input", fetchDriversDatas);

const renderDriversList = () => {
    driversList.innerHTML = "";
    const startIndex = currentPageDriver * driversPerPage;
    const endIndex = startIndex + driversPerPage;
    const driversToDisplay = driversDatas.slice(startIndex, endIndex);
    driversToDisplay.forEach(driver => {
        const li = document.createElement('li');
        const pPos = document.createElement('p');
        const pDriverName = document.createElement('p');
        const pNumber = document.createElement('p');
        const pTeam = document.createElement('p');
        const pPoints = document.createElement('p');
        const pWins = document.createElement('p');

        pPos.textContent = "Position : " + driver.position;
        pDriverName.textContent = "Nom du Pilote : " + driver.driver.name;
        pNumber.textContent = "Numéro du Pilote : " + driver.driver.number;
        pTeam.textContent = "Équipe du pilote : " + driver.team.name;
        pPoints.textContent = "Nombre de points gagnés : " + driver.points;
        pWins.textContent = "Nombre de victoires : " + driver.wins;

        li.appendChild(pPos);
        li.appendChild(pDriverName);
        li.appendChild(pNumber);
        li.appendChild(pTeam);
        li.appendChild(pPoints);
        li.appendChild(pWins);
        li.classList.add("driversLi-content");

        driversList.appendChild(li);
        const totalPages = Math.ceil(driversDatas.length / driversPerPage);
        document.getElementById('driverPageNumber').textContent = `Page ${currentPageDriver + 1}/${totalPages}`;
    });
}

function firstPageTeam() {
    currentPageTeam = 0;
    renderTeamsList();
}

function previousPageTeam() {
    if (currentPageTeam > 0) {
        currentPageTeam--;
        renderTeamsList();
    }
}

function nextPageTeam() {
    if (currentPageTeam < Math.ceil(teamsDatas.length / teamsPerPage) - 1) {
        currentPageTeam++;
        renderTeamsList();
    }
}

function lastPageTeam() {
    currentPageTeam = Math.ceil(teamsDatas.length / teamsPerPage) - 1;
    renderTeamsList();
}

function firstPageDriver() {
    currentPageDriver = 0;
    renderDriversList();
}

function previousPageDriver() {
    if (currentPageDriver > 0) {
        currentPageDriver--;
        renderDriversList();
    }
}

function nextPageDriver() {
    if (currentPageDriver < Math.ceil(driversDatas.length / driversPerPage) - 1) {
        currentPageDriver++;
        renderDriversList();
    }
}

function lastPageDriver() {
    currentPageDriver = Math.ceil(driversDatas.length / driversPerPage) - 1;
    renderDriversList();
}
