function create_code_part(index, text) {
    let parent = document.getElementById("c-c" + String(index));
    while (parent.firstChild) parent.removeChild(parent.firstChild);
    code_div = document.createElement('div');
    code_div.className = 'code-box';
    code_p = document.createElement('code');
    code_p.appendChild(document.createTextNode(text));
    code_div.appendChild(code_p);
    parent.appendChild(code_div);
}

function create_desc_part(index, text) {
    let parent = document.getElementById("c-c" + String(index));
    while (parent.firstChild) parent.removeChild(parent.firstChild);
    p = document.createElement('p');
    p.appendChild(document.createTextNode(text));
    parent.appendChild(p);
}

function openContactOverlay() {
    document.getElementById("contactOverlay").style.display = "flex";
}

function closeContactOverlay() {
    document.getElementById("contactOverlay").style.display = "none";
}

function openLoginOverlay() {
    document.getElementById("loginOverlay").style.display = "flex";
}
function closeLoginOverlay() {
    document.getElementById("loginOverlay").style.display = "none";
}

function update_cards(search_val) {
    var main = document.getElementById("index-main");
    main.childNodes.forEach(node => {
        if (node.className == "card"){
            console.log(node.childNodes[5].childNodes[1]);
            if (node.childNodes[5].childNodes[1].innerText.includes(search_val)) node.style.display="flex";
            else node.style.display="none";
        }
    });
}