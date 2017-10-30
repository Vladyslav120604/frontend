function selection() {
	var pattern = document.getElementById('pattern').value;
	var flags = document.getElementById('flags').value;
	var text = document.getElementById('text').value;

	checkingInformationIromInputFields(pattern, flags, text);
	var regExp = new RegExp(pattern, flags);
	var selectedText = selectionOfSuitableText(regExp, text);
	var output = replaceOfSuitableText(regExp, text, selectedText);
	var text = document.getElementById('text').value

	var target = document.getElementById('result').innerHTML
	 = output;
    
}

function checkingInformationIromInputFields (pattern, flags, text){
	if(pattern == null){
		console.log('var pattern == null')
		return false;
	}
	if(flags == null){
		console.log('var flags == null')
		return false;
	}
	if(text == null){
		console.log('var text == null')
		return false;
	}
}

function selectionOfSuitableText (regExp, text){
	var select = text.match(regExp);
	return select;
}

function replaceOfSuitableText (regExp, text, selectedText){
	var i = 0;
	var markedText = text.replace(regExp, function () {
		var markedPart = '<mark>' + selectedText[i] + '</mark>';
		i++;
		return markedPart;
	});
	return markedText;
} 


