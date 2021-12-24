function drawText() {
    let request = new XMLHttpRequest();

    request.open('POST', 'request.php');

    request.send();

    request.onload = function() {

        let rsp = JSON.parse(request.response); 

        if(rsp.status == 'success') {
            alert('success request');
        } else {
            alert('ERROR');
        }
    }
}

function changeMode(obj) {
    let mode = obj.getAttribute('data-mode');
    
    let data = new FormData();
    data.append('value', mode);
    data.append('action', 'change-mode');

    let request = new XMLHttpRequest();
    request.open('POST', 'setCookie.php');
    request.send(data);

    request.onload = function() {
       
        if(request.status == 200 && request.response == 'ok') {
            if(mode == 'dark') {
                document.body.classList.remove('light');
                document.body.classList.add('dark');
                obj.innerText = "Light Mode";
                obj.setAttribute('data-mode', 'light');
            } else {
                document.body.classList.add('light');
                document.body.classList.remove('dark');
                obj.innerText = "Dark Mode";
                obj.setAttribute('data-mode', 'dark');
            }
        }
    }
    
}

function subscribe() {
    
    let email = document.getElementById('subscribe-email').value;
    let name = document.getElementById('subscribe-name').value;
    let number = document.getElementById('subscribe-number').value;

    if(!email||!name||!number) {
        alert('please fill in all fealds');
        return false;
    }

    let data = new FormData();
    data.append('action', 'subscribe');
    data.append('email', email);
    data.append('name', name);
    data.append('phonenumber', number);
    console.log(data)
  
    let request = new XMLHttpRequest();

    request.open('POST', 'actions.php');
    request.send(data);

    request.onload = function() {
        console.log(request);
        if(request.status == 200) {
            document.getElementById('content').classList.add('subscribe-success');
        }
    }
}

function resubscribe() {
    document.getElementById('subscribe-form').reset();
    document.getElementById('content').classList.remove('subscribe-success');
}