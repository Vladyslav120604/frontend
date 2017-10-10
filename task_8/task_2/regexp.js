function selection() {
	var pattern = document.getElementById('pattern').value;
	var flags = document.getElementById('flags').value;
	var text = document.getElementById('text').value;

	checkInputInfo(pattern, flags, text);
	var regExp = new RegExp(pattern, flags);
	var selectedText = matchTextOfRegExp(regExp, text);
	var output = replaceTextOfRegExp(regExp, text, selectedText);
	document.getElementById('outputText').innerHTML = output;
}

function checkInputInfo (pattern, flags, text){
	if(pattern == null){
		console.log('var pattern = null')
		return false;
	}
	if(flags == null){
		console.log('var flags = null')
		return false;
	}
	if(text == null){
		console.log('var text = null')
		return false;
	}
}

function matchTextOfRegExp (regExp, text){
	var select = text.match(regExp);
	return select;
}

function replaceTextOfRegExp (regExp, text, selectedText){
	var i = 0;
	var markText = text.replace(regExp, function () {
		var markTextPart = '<mark>'+selectedText[i]+'</mark>';
		i++;
		return markTextPart;
	});
	return markText;
} 


