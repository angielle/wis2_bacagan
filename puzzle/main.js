function init() {
	var btns = document.querySelectorAll('.box');
	btns.forEach((el) => {
		el.addEventListener('click', () => {
			var id = parseInt(el.id);

			var btnText = document.getElementById(id).innerText;
			var btnBg = document.getElementById(id).style.backgroundColor;
			var btnColor = document.getElementById(id).style.color;

			if (id == 1 || id == 4 || id == 7) {
				var rightText = document.getElementById(id+1).innerText;
				var rightBg = document.getElementById(id+1).style.backgroundColor;
				var rightColor = document.getElementById(id+1).style.color;

				// Change text
				document.getElementById(id).innerText = rightText;
				document.getElementById(id).style.backgroundColor = rightBg;
				document.getElementById(id).style.color = rightColor;

				document.getElementById(id+1).innerText = btnText;
				document.getElementById(id+1).style.backgroundColor = btnBg;
				document.getElementById(id+1).style.color = btnColor;

			} else if (id == 2 || id == 5 || id == 8) {
				var leftText = document.getElementById(id-1).innerText;
				var leftBg = document.getElementById(id-1).style.backgroundColor;
				var leftColor = document.getElementById(id-1).style.color;

				var rightText = document.getElementById(id+1).innerText;
				var rightBg = document.getElementById(id+1).style.backgroundColor;
				var rightColor = document.getElementById(id+1).style.color;

				document.getElementById(id-1).innerText = rightText;
				document.getElementById(id-1).style.backgroundColor = rightBg;
				document.getElementById(id-1).style.color = rightColor;

				document.getElementById(id+1).innerText = leftText;
				document.getElementById(id+1).style.backgroundColor = leftBg;
				document.getElementById(id+1).style.color = leftColor;


			} else if (id == 3 || id == 6 || id == 9 ) {
				var leftText = document.getElementById(id-1).innerText;
				var leftBg = document.getElementById(id-1).style.backgroundColor;
				var leftColor = document.getElementById(id-1).style.color;

				document.getElementById(id).innerText = leftText;
				document.getElementById(id).style.backgroundColor = leftBg;
				document.getElementById(id).style.color = leftColor;

				document.getElementById(id-1).innerText = btnText;
				document.getElementById(id-1).style.backgroundColor = btnBg;
				document.getElementById(id-1).style.color = btnColor;
			}

		})
	})
}

init();
