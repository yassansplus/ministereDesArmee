document.addEventListener('click', function (e) {
    console.log(e.target)
    if (e.target && e.target.classList.contains("answer-to-hibot")) {
        let id = e.target.getAttribute('data-id');
        let content = e.target.getAttribute('data-userinteraction')
        replyToHibot(id, content);
    }
});

function replyToHibot(id, content) {
    createElementUserAnswer(content, false);
    getAnswer(id).then((myJson) => {
        myJson = JSON.parse(myJson);
        createElementUserAnswer(Object.keys(myJson)[0], true);
        updateUserAnswers(myJson[Object.keys(myJson)[0]]);
        var objDiv = document.getElementById("interactionSectionWithHibot");
        objDiv.scrollTop = objDiv.scrollHeight;
    })
}

function createElementUserAnswer(content, isHibot) {
    imgClone = document.getElementById('imageHibot').cloneNode(true);
    //if isHibot true => bubble will be to the left
    var li = document.createElement('li');
    var div = document.createElement('div');
    var para = document.createElement("p");
    var node = document.createTextNode(content);
    div.className = "chat-body clearfix"
    li.className = `clearfix ${isHibot ? 'agent' : 'admin'}   position-relative`;
    if (isHibot) {
        li.appendChild(imgClone);
    }

    para.appendChild(node);
    div.appendChild(para);
    li.appendChild(div);
    blockChat = document.getElementById('chatWithHibot');
    blockChat.appendChild(li);
}

function updateUserAnswers(answers) {
    let $boxAnswer = document.getElementById('AnswersToHibot');
    $boxAnswer.childNodes.forEach(button => {
        button.className += ' animate__animated animate__zoomOut'
    })
    setTimeout(() => {
        $boxAnswer.innerHTML = ''
        for (const property in answers) {
            var button = document.createElement('button');
            button.className = 'btn btn-outline-primary answer-to-hibot';
            button.setAttribute('data-id', property);
            button.setAttribute('data-userinteraction', answers[property]);
            button.appendChild(document.createTextNode(answers[property]))
            $boxAnswer.appendChild(button);
            window.getComputedStyle(button).opacity;
            button.className += ' animate__animated animate__bounceIn'
        }
    }, 500);
}

function getAnswer(id) {
    var base_url = window.location.origin;
    return fetch(base_url + `/chatbot/${id}`).then((response) => {
        return response.json();
    })
}
