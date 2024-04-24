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
        console.log("teamsDatas", teamsDatas);
        renderTeamsList();
    } catch (error) {
        console.error(error);
    }
}


inputYear.addEventListener("input", fetchTeamDatas);

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

const renderTeamsList = () =>{
    teamsList.innerHTML = "";
    teamsDatas.forEach(team =>{
        const li = document.createElement('li');
        const pPos = document.createElement('p');
        const pTeamName = document.createElement('p');
        const pPoints = document.createElement('p');
        const pWins = document.createElement('p');

        pPos.textContent = team.position;
        pTeamName.textContent = team.team.name;
        pPoints.textContent = team.points;
        pWins.textContent = team.wins;

        li.appendChild(pPos);
        li.appendChild(pTeamName);
        li.appendChild(pPoints);
        li.appendChild(pWins);

        teamsList.appendChild(li);
    });
}

const renderDriversList = () =>{
    teamsList.innerHTML = "";
    teamsDatas.forEach(team =>{
        const li = document.createElement('li');
        const pPos = document.createElement('p');
        const pTeamName = document.createElement('p');
        const pPoints = document.createElement('p');
        const pWins = document.createElement('p');

        pPos.textContent = team.position;
        pTeamName.textContent = team.team.name;
        pPoints.textContent = team.points;
        pWins.textContent = team.wins;

        li.appendChild(pPos);
        li.appendChild(pTeamName);
        li.appendChild(pPoints);
        li.appendChild(pWins);

        teamsList.appendChild(li);
    });
}