function getClientStats()
{
    var ajax = new XMLHttpRequest();

    var username = document.getElementById('username').value;

    ajax.onreadystatechange = function() {
		if (ajax.readyState === 4 && ajax.status === 200) {
			document.getElementById('placeholder-clientStats').innerHTML = ajax.responseText;
		}
    };
    
    ajax.open('GET', `client_stats.php?username=${username}`);
    ajax.send();
}

function getNetworkStats()
{
    var ajax = new XMLHttpRequest();

    var startTime = document.getElementById('startTime').value;
    var endTime = document.getElementById('endTime').value;

    ajax.onload = () => {
        let placeholderNetworkStats = document.getElementById('placeholder-networkStats');
        placeholderNetworkStats.innerHTML='';

        let xml = ajax.responseXML;

        if(xml == null)
            return;
        
        console.log(xml);

        let inTraffic = xml.getElementsByTagName('inTraffic');
        let outTraffic = xml.getElementsByTagName('outTraffic');

        let table = document.createElement('table');

        let tr = document.createElement('tr');

        let th = document.createElement('th');
        th.innerHTML = 'All in traffic';
        tr.appendChild(th);

        th = document.createElement('th');
        th.innerHTML = 'All out traffic';
        tr.appendChild(th);

        table.appendChild(tr);

        tr = document.createElement('tr');

        let td = document.createElement('td');
        td.innerHTML = inTraffic[0].textContent;
        tr.appendChild(td);

        td = document.createElement('td');
        td.innerHTML = outTraffic[0].textContent;
        tr.appendChild(td);

        table.appendChild(tr);

        placeholderNetworkStats.appendChild(table);
        let br = document.createElement('br');
        placeholderNetworkStats.appendChild(br);
    }

    ajax.open('GET', `network_stats.php?startTime=${startTime}&endTime=${endTime}`);
    ajax.send();
}

function getMinusBalance()
{
    var ajax = new XMLHttpRequest();

    ajax.onload = () => {

        let placeholderMinusBalance = document.getElementById('placeholder-minusBalance');
        placeholderMinusBalance.innerHTML='';

        let response = ajax.responseText;

        if(response==null)
        {
            return;
        }

        let debtors = JSON.parse(response);

        let table = document.createElement('table');

        let tr = document.createElement('tr');

        let th = document.createElement('th');
        th.innerText = 'Name';
        tr.appendChild(th);

        th = document.createElement('th');
        th.innerText = 'Login';
        tr.appendChild(th);

        th = document.createElement('th');
        th.innerText = 'Balance';
        tr.appendChild(th);

        table.appendChild(tr);

        debtors.forEach(debtor => {

            tr = document.createElement('tr');

            let td = document.createElement('td');
            td.innerText = debtor.name;
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerText = debtor.login;
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerText = debtor.balance;
            tr.appendChild(td);

            table.appendChild(tr);
        });

        placeholderMinusBalance.appendChild(table);
    }

	ajax.open('GET', 'minus_balance.php');
	ajax.send();
}