$(document).ready(() => {
    console.log("READY!");
    // let announcements = null;
    // loadData();
    
});

function loadData() {
    console.log('laodData func');
    
    const request = new XMLHttpRequest();
    // handle POST request
    request.onload = () => {
        let respObj = null;
        // try and get response
        try {
            respObj = JSON.parse(request.responseText);
        } catch (e) {
            console.error('Could not parse JSON!');
        }

        if (respObj) {
            console.log(respObj);
            // announcements = respObj;
            // updateList(respObj);
        } else  {
            console.log('Could not load data!');
        }
    }
    // open & send post request to get data
    request.open('post', 'get_announcements.php');
    request.send();
}

function updateList(announcements_list) {
    // $('#announcements_list').empty();

    // announcements_list.forEach(row => {
    //     let html = "";

    // });
}