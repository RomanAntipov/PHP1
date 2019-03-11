function myScript () {
	console.log('script start');
	var images = document.getElementsByTagName('img');
	console.log (images);
	for (var i=1; i<images.length; i++) {
		images[i].onclick = showBigPicture;
		//images[i].onerror = showErr;
	}
}

function showBigPicture (ev) {
	var picField = document.getElementById('bigView'); // выбираем элемент в котором будет отображаться крупное изображение в галерее
	picField.innerHTML = '';  // помещаем в этот элемент пустую строку
	var e = ev.target;
	console.log ('target: '+ e);
	// var imageNum = e.id.split('_');
	var imageProperties = e.id.split(' ');
	var imageFileName = imageProperties[0];
	var imageViewCounter = imageProperties[1];
	console.log ('filename: ' + imageFileName + ' viewcounter: ' + imageViewCounter);
	var src = imageFileName;
	var makeBigImg = document.createElement('img');
	makeBigImg.src = src;
	makeBigImg.width = '750';
	picField.appendChild(makeBigImg);
	document.getElementById('counter').innerHTML = imageViewCounter.toString();
	makeBigImg.onerror = showErr;

	
	//var tag = '<img src=big/'+ imageNum[1] + '.jpg width="750px"/>';
	//console.log (tag);
	//picField.innerHTML = tag;
	//picField.onerror = showErr;


}

function showErr() {
	// console.log ('отобразить ошибку');
	// picField.innerHTML = '<p>Ошибка загрузки изображения</p>';
	alert ('File not found!');
}

window.onload = myScript;