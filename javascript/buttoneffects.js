const buttonWrapper = document.querySelector(".button_wrapper");
const reset = document.querySelector(".reset");
console.log("starting script");
buttonWrapper.addEventListener("click", () => {
	if (!buttonWrapper.classList.contains("loading")) {
		buttonWrapper.classList.add("loading");
        console.log("starting XML");
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'addData.php');
        console.log("loading uploadData");
        xhr.onload = function() {
        if (xhr.status === 200) {
            // do something with the response

            if(xhr.readyState === 4)
            {
                buttonWrapper.classList.add("done");
			    reset.classList.remove("hidden");

                //redirect 
                setTimeout(() => 
                {
                    window.location.href = "./certificates.php";

                }, 2400);
            }
        } else {
            // handle error
            console.log('Error: ' + xhr.status);
        }
};
xhr.send();


		// setTimeout(() => {
		// 	buttonWrapper.classList.add("done");
		// 	reset.classList.remove("hidden");
		// }, 2400);
	}
});

reset.addEventListener("click", () => {
	reset.classList.add("hidden");
	buttonWrapper.classList.remove("loading", "done");
});
