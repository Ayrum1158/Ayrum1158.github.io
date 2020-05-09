function ClientMsgs() {

    let login = document.getElementById('login_select').value;

    let PH = document.getElementById('MSGS_PH');

    var ajax = new XMLHttpRequest();

    PH.innerHTML = ""

    ajax.onload = () => {
        let messages = JSON.parse(ajax.responseText);

        let table = document.createElement("table");

        let tr = document.createElement("tr");

        let th = document.createElement("th");
        th.innerText = login;
        tr.appendChild(th);
        table.appendChild(tr);

        let td;

        messages.forEach(message => {
            tr = document.createElement("tr");
            td = document.createElement("td");
            td.innerText = message;
            tr.appendChild(td);
            table.appendChild(tr);
        });

        PH.appendChild(table);

        let key = login;
        let value = ajax.responseText;

        localStorage.setItem(key, value);
    }
    ajax.open('GET', `Messages.php?login=${login}`);
    ajax.send();
}

function ClientMsgsLocal()
{
    let PH = document.getElementById('MSGS_PH');
    PH.innerHTML = ""

    let key = document.getElementById('login_select').value;
    let data = localStorage.getItem(key);

    if(data===null)
    {
        alert('No stored data for this key!')
        return;
    }

    let messages = JSON.parse(data);

        let table = document.createElement("table");

        let tr = document.createElement("tr");

        let th = document.createElement("th");
        let login = document.getElementById('login_select').value;
        th.innerText = login;
        tr.appendChild(th);
        table.appendChild(tr);

        let td;

        messages.forEach(message => {
            tr = document.createElement("tr");
            td = document.createElement("td");
            td.innerText = message;
            tr.appendChild(td);
            table.appendChild(tr);
        });

        PH.appendChild(table);
}

function TotalIOTraffic()
{
    var ajax = new XMLHttpRequest();

    let PH = document.getElementById('IOTRAFFIC_PH');
    PH.innerHTML = "";

    ajax.onload = () => {
        PH.innerHTML = ajax.responseText;
    }

    ajax.open('GET', 'InOutTraffic.php');
    ajax.send();
}

function MinusBalance()
{
    var ajax = new XMLHttpRequest();

    let PH = document.getElementById('NEGBALANCE_PH');
    PH.innerHTML = "";

    ajax.onload = () => {
        PH.innerHTML = ajax.responseText;
    }

    ajax.open('GET', 'MinusBalance.php');
    ajax.send();


}