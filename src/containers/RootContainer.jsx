import React from 'react'
import Stats from '../components/Stats'
import '../css/base.css'

class RootContainer extends React.Component {

// <!--$character =  -->
//  <!-- iPhone Stuff - 1st line disables zooming, 2nd line allows for fullscreen view (without browser widgets) -->
  //<meta name="viewport" content="width=device-width; initial-scale=0.5; maximum-scale=0.5; user-scalable=0;"/>
  //<meta name="apple-mobile-web-app-capable" content="yes"/>
              //<link rel="stylesheet" type="text/css" href="charsheet.css"/>
         //<div class= "block" id="timeDivContainer">
           //<div class="centered" id="timeDiv"></div>
         //</div>
  render() {
    return (
      <Stats/>
    )
  }
}

export default RootContainer;
