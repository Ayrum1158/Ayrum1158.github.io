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

