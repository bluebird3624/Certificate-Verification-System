const buttonWrapper = document.querySelector(".button_wrapper");
const reset = document.querySelector(".reset");

buttonWrapper.addEventListener("click", () => {
	if (!buttonWrapper.classList.contains("loading")) {
		buttonWrapper.classList.add("loading");

        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'certgenerator.php');
        xhr.onload = function() {
        if (xhr.status === 200) {
            // do something with the response
            var res=JSON.parse(xhr.responseText);
            if(res = "done")
            {
                console.log(res);
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
