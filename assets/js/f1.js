const inputYear = document.getElementById("year");
const teamsList = document.querySelector(".teamsList");
const driversList = document.querySelector(".driversList");

let teamsDatas = [];
let driversDatas = [];

async function fetchTeamDatas() {
    try {
        const url = `https://api-formula-1.p.rapidapi.com/rankings/teams?season=${inputYear.value}`;
        const options = {
            method: 'GET',
            headers: {
                'X-RapidAPI-Key': '87eed599ecmshe272682de6a9bcep1a9a8ejsn1eabd407da7e',
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

const renderTeamsList = () =>{
    teamsList.innerHTML = "<h1>Teams Ranking</h1>";
    teamsDatas.forEach(team =>{
        const li = document.createElement('li');
        const pPos = document.createElement('p');
        const pTeamName = document.createElement('p');
        const pPoints = document.createElement('p');

        pPos.textContent = "Position de l'équipe : " + team.position;
        pTeamName.textContent = "Nom de l'équipe : " +  team.team.name;
        pPoints.textContent = "Points gagnés : " +  team.points;

        li.appendChild(pPos);
        li.appendChild(pTeamName);
        li.appendChild(pPoints);
        li.classList.add("teamsLi-content");

        teamsList.appendChild(li);
    });
}

async function fetchDriversDatas() {
    try {
        const url = `https://api-formula-1.p.rapidapi.com/rankings/drivers?season=${inputYear.value}`;
        const options = {
            method: 'GET',
            headers: {
                'X-RapidAPI-Key': '87eed599ecmshe272682de6a9bcep1a9a8ejsn1eabd407da7e',
                'X-RapidAPI-Host': 'api-formula-1.p.rapidapi.com'
            }
        };
        const response = await fetch(url, options);
        const { response : responseData } = await response.json();
        driversDatas = responseData;
        renderDriversList();
        
    } catch (error) {
        console.error(error);
    }
}

inputYear.addEventListener("input", fetchDriversDatas);

const renderDriversList = () =>{
    driversList.innerHTML = "<h1>Drivers Ranking</h1>";
    driversDatas.forEach(driver =>{
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
    });
}