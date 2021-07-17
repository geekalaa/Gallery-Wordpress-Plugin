let guid = () => {
  let s4 = () => {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1)
  }
  //return id of format 'aaaaaaaa'-'aaaa'-'aaaa'-'aaaa'-'aaaaaaaaaaaa'
  return (
    s4() +
    s4() +
    '-' +
    s4() +
    '-' +
    s4() +
    '-' +
    s4() +
    '-' +
    s4() +
    s4() +
    s4()
  )
}

var slider = document.getElementById('myRange')
var nnumberofthemargin = document.getElementById('margin-between')

var slideradius = document.getElementById('myRangeRadius')
var nnumberoftheradius = document.getElementById('radius-input')


var items = document.getElementsByClassName('grid-stack-item-content')
var pluginrelativeUrl = window.pluginrelativeUrl
var clicked = false

let grid = GridStack.init(
  {
    minRow: 1,
  },
  '.grid-stack2'
) // don't let it collapse when empty



nnumberofthemargin.addEventListener('input', () => {
  document.getElementById('myRange').value = nnumberofthemargin.value
  for (var i = 0; i < items.length; i++) {
    items[i].style.cssText += 'inset:' + nnumberofthemargin.value + 'px;'
  }
})
slider.oninput = function () {
  for (var i = 0; i < items.length; i++) {
    items[i].style.cssText += 'inset:' + this.value + 'px;'
  }
  nnumberofthemargin.value = this.value
}

nnumberoftheradius.addEventListener('input', () => {
  document.getElementById('myRangeRadius').value = nnumberoftheradius.value
  for (var i = 0; i < items.length; i++) {
    items[i].style.cssText +=
      'border-radius:' + nnumberoftheradius.value + 'px;'
    if (nnumberoftheradius.value >= 15) {
      items[i]
        .getElementsByTagName('button')[0]
        .classList.add('removeWidgetcustomgallery')
    }
  }
})

slideradius.oninput = function () {
  for (var i = 0; i < items.length; i++) {
    items[i].style.cssText += 'border-radius:' + this.value + 'px;'
    if (this.value >= 15) {
      items[i]
        .getElementsByTagName('button')[0]
        .classList.add('removeWidgetcustomgallery')
    }
  }
  nnumberoftheradius.value = this.value
}

function addImage() {
  clicked = true
  document.getElementById('addWidget').style.animation = 'none'
  grid.addWidget({
    x: 0,
    h: 2,
    y: 0,
    w: 2,
    content:
      '<button onclick="grid.removeWidget(this.parentNode.parentNode)" style=" position: absolute; opacity: 0.5; ">X</button><img onclick="changeImageGallery(this.parentNode.parentNode.getAttribute(' +
      "'" +
      'gs-id' +
      "'" +
      '))" style="object-fit: cover;width: 100%;height: 100%;" src="' +
      pluginrelativeUrl +
      '/assets/placeholder.png">',
    id: guid(),
  })
  var newItems = document.getElementsByClassName('grid-stack-item-content')
  for (var i = 0; i < newItems.length; i++) {
    //   console.log(newItems.length);
    newItems[i].style.cssText += 'inset:' + nnumberofthemargin.value + 'px;'
    newItems[i].style.cssText +=
      'border-radius:' + nnumberoftheradius.value + 'px;'
      if(bordersetting.enabled){
        newItems[i].style.cssText += 'border:' + bordersetting.width + 'px ' + bordersetting.style  + ' ' + bordersetting.color;
      }
    if (nnumberoftheradius.value >= 15) {
      newItems[i]
        .getElementsByTagName('button')[0]
        .classList.add('removeWidgetcustomgallery')
    }
  }
}

function addVideo() {
  clicked = true
  document.getElementById('addWidget').style.animation = 'none'
  grid.addWidget({
    x: 0,
    h: 2,
    y: 0,
    w: 2,
    content:
      '<button onclick="grid.removeWidget(this.parentNode.parentNode)" style=" position: absolute; opacity: 0.5; z-index: 999; ">X</button><video controls="" onclick="changeVideoGallery(this.parentNode.parentNode.getAttribute(' +
      "'" +
      'gs-id' +
      "'" +
      '))" style="width: 100%;height: 100%;object-fit: cover;"> <source src="" type="video/mp4"></video>',
    id: guid(),
  })
  var newItems = document.getElementsByClassName('grid-stack-item-content')
  for (var i = 0; i < newItems.length; i++) {
    //   console.log(newItems.length);
    newItems[i].style.cssText += 'inset:' + nnumberofthemargin.value + 'px;'
    newItems[i].style.cssText +=
      'border-radius:' + nnumberoftheradius.value + 'px;'
      if(bordersetting.enabled){
        newItems[i].style.cssText += 'border:' + bordersetting.width + 'px ' + bordersetting.style  + ' ' + bordersetting.color;
        }
    if (nnumberoftheradius.value >= 15) {
      newItems[i]
        .getElementsByTagName('button')[0]
        .classList.add('removeWidgetcustomgallery')
    }
  }
}

function addShortcodegal() {
  var shortcodeId = 'shortcode'+guid()
  clicked = true
  document.getElementById('addWidget').style.animation = 'none'
  grid.addWidget({
    x: 0,
    h: 2,
    y: 0,
    w: 2,
    content:
      `<button onClick="removeshortcode(this.parentNode.parentNode,'${shortcodeId}')" style=" position: absolute; opacity: 0.5; z-index: 999; ">X</button><div shortCodeId="` +
      shortcodeId +
      '" class="shortcodeinput"><input type="text" id="' +
      shortcodeId +
      '" placeholder="Paste here your shortcode" class="inputshort"><a id="' +
      shortcodeId +
      '" class="preview-shortcode-gal">SAVE</a></div>',
    id: shortcodeId,
  })
  var newItems = document.getElementsByClassName('grid-stack-item-content')
  for (var i = 0; i < newItems.length; i++) {
    //   console.log(newItems.length);
    newItems[i].style.cssText += 'inset:' + nnumberofthemargin.value + 'px;'
    newItems[i].style.cssText +=
      'border-radius:' + nnumberoftheradius.value + 'px;'
      if(bordersetting.enabled){
        newItems[i].style.cssText += 'border:' + bordersetting.width + 'px ' + bordersetting.style  + ' ' + bordersetting.color;
        }
    if (nnumberoftheradius.value >= 15) {
      newItems[i]
        .getElementsByTagName('button')[0]
        .classList.add('removeWidgetcustomgallery')
    }
  }
}




//ADD VIDEO FROM YOUTUBE 
function addYoutubecodegal() {
  var YoutubecodeId = 'youtube'+guid()
  clicked = true
  document.getElementById('addWidget').style.animation = 'none'
  grid.addWidget({
    x: 0,
    h: 2,
    y: 0,
    w: 2,
    content:
      `<button onClick="removeYoutubecode(this.parentNode.parentNode,'${YoutubecodeId}')" style=" position: absolute; opacity: 0.5; z-index: 999; ">X</button><div youtubeCodeId="` +
      YoutubecodeId +
      '" class="Youtubecodeinput"><input type="text" id="' +
      YoutubecodeId +
      '" placeholder="Paste here the video ID" class="inputyoutube"><a id="' +
      YoutubecodeId +
      '" class="preview-youtube-gal">SAVE</a></div>',
    id: YoutubecodeId,
  })
  var newItems = document.getElementsByClassName('grid-stack-item-content')
  for (var i = 0; i < newItems.length; i++) {
    //   console.log(newItems.length);
    newItems[i].style.cssText += 'inset:' + nnumberofthemargin.value + 'px;'
    newItems[i].style.cssText +=
      'border-radius:' + nnumberoftheradius.value + 'px;'
      if(bordersetting.enabled){
        newItems[i].style.cssText += 'border:' + bordersetting.width + 'px ' + bordersetting.style  + ' ' + bordersetting.color;
        }
    if (nnumberoftheradius.value >= 15) {
      newItems[i]
        .getElementsByTagName('button')[0]
        .classList.add('removeWidgetcustomgallery')
    }
  }
}






serializedData = []

loadGrid = function () {
  grid.removeAll()
  grid.load(serializedData, true) // update things
  grid.float(true);
}

clearGrid = function () {
  grid.removeAll()
}

saveGrid = function () {
  serializedData = grid.save()
  serializedData.forEach((n, i) => {
    n.content = n.content.replace(
      '<button id="removegridgal" onclick="grid.removeWidget(this.parentNode.parentNode)" style=" position: absolute; opacity: 0.5; ">X</button>',
      ''
    )
    n.content = n.content.replace(
      '<button onclick="grid.removeWidget(this.parentNode.parentNode)" style=" position: absolute; opacity: 0.5; z-index: 999; ">X</button>',
      ''
    )
    n.content = n.content.replace(
      '<button onclick="grid.removeWidget(this.parentNode.parentNode)" style=" position: absolute; opacity: 0.5; z-index: 999; " class="removeWidgetcustomgallery">X</button>',
      ''
    )
    n.content = n.content.replace(
      '<button onclick="grid.removeWidget(this.parentNode.parentNode)" style=" position: absolute; opacity: 0.5; ">X</button>',
      ''
    )
    n.content = n.content.replace(
      '<button onclick="grid.removeWidget(this.parentNode.parentNode)" style=" position: absolute; opacity: 0.5; " class="removeWidgetcustomgallery">X</button>',
      ''
    )
    n.content = n.content.replace(
      `onclick="changeImageGallery(this.parentNode.parentNode.getAttribute('gs-id'))"`,
      ''
    )

    n.content = n.content.replace(
      `onclick="changeVideoGallery(this.parentNode.parentNode.getAttribute('gs-id'))"`,
      ''
    )
  })
  // document.querySelector('#saved-data').value = JSON.stringify(serializedData, null, '  ');
  return serializedData
}
loadGrid()
