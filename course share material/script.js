document.querySelector("#submit").onclick = function (event) {
  event.preventDefault();
  if (document.querySelector("#name input").value.length == 0) {
    alert("Kindly Enter the topic name!!!!");
  } else if (document.querySelector("#description input").value.length == 0) {
    alert("Kindly Enter the description !!!!");
  } else if (document.querySelector("#upload input").value.length == 0) {
    alert("Kindly choose what you want to upload!!!!");
  } else {
    document.querySelector(".posts").innerHTML += `
            <div class="task">

              <span id="topicName">

                  ${document.querySelector("#name input").value}
              </span>
                <span id="des">

                ${document.querySelector("#description input").value}
                </span>
                <span id="file">
                <p>2023/04/12</p>
                <button type="button" id="download">Download</button>
                </span>
            </div>
        `;

    let Input = document.querySelectorAll("#n1,#n2,#n3");
    Input.forEach((input) => {
      input.value = "";
    });
  }
};
// ${document.querySelector("#upload input").value}
