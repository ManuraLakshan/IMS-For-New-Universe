function getDate(element)
{
	window.onload = (e) =>{
		fetch("http://worldtimeapi.org/api/timezone/Asia/Colombo")
			.then(res => res.json())
			.then(d => {

				let date = d.datetime.split("T");
				element.value = date[0];
				element.min = date[0];
				element.max = date[0];
			});
	};
}
