const heroHello=document.querySelector("#hero__hello"),sentences=["Hello World","Hello ... is it me you're looking for?","Hello Clarice","Hello darkness, my old friend ...","Hello. My name is Inigo Montoya. You killed my father. Prepare to die!"],sentenceColors=["#2C6E49","#F26A8D","#99CC33","#4C956C","#F39237"];let sentenceIndex=0;const typingSpeed=200,deletingSpeed=100;function typeText(e,n,t){0===n&&(heroHello.innerHTML="");const o=e.split(/\b(Hello\b\.?)/i),l=o[1]||"",s=(o.slice(2).join(""),sentenceColors[sentenceIndex]),i=e.substring(0,n);n<=l.length?heroHello.innerHTML=`<span style="color: #040b07;">${i}</span>`:heroHello.innerHTML=`<span style="color: #040b07;">${l}</span><span style="color: ${s};">${i.substring(l.length)}</span>`,n<e.length?(n++,setTimeout((function(){typeText(e,n,t)}),200)):setTimeout(t,1e3)}function deleteText(e,n,t){const o=e.split(/\b(Hello\b\.?)/i),l=o[1]||"",s=(o.slice(2).join(""),sentenceColors[sentenceIndex]);if(n>=0){const o=e.substring(0,n);n>=l.length?heroHello.innerHTML=`<span style="color: #040b07;">${l}</span><span style="color: ${s};">${o.substring(l.length)}</span>`:heroHello.innerHTML=`<span style="color: #040b07;">${o}</span>`,n--,setTimeout((function(){deleteText(e,n,t)}),100)}else t()}function typeAndDeleteLoop(){const e=sentences[sentenceIndex];typeText(e,0,(function(){deleteText(e,e.length,(function(){sentenceIndex=(sentenceIndex+1)%sentences.length,setTimeout(typeAndDeleteLoop,1e3)}))}))}typeAndDeleteLoop();