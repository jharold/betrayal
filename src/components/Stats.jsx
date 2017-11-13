import React from 'react'
import characterData from './characterData'
import '../css/base.css'

class Stats extends React.Component {

  constructor(props) {
    super(props)
    this.state = {
      characters: characterData,
    }
  }

  addToStat = (stat) => {
    if (stat < 8) {
      stat++
    }
    this.statCounter(stat)
  }

  subtractFromStat = (stat) => {
    if (stat > 0) {
      stat--
    }
    this.statCounter(stat)
  }

  statCounter = (stat) => {
    let character = this.state.characters["zostra"]
    let playerTextColor = character.color
    let currentIndex = character[stat.toLowerCase()].initial
    let statValues = character[stat.toLowerCase()].values
    let drawStats = statValues.map((statValue, index) => 
      (currentIndex === index) ? 
      <span style={{color: playerTextColor }}><li key={index}>{statValue}</li></span> :
      <li key={index}>{statValue}</li> 
    )
    return(
      <div>
        <p className="statHeader">
          <span style={{color: playerTextColor }}>{stat}</span></p>
        <div>
          {drawStats}
        </div>
      </div>
    )
  }

render() {
    return (
      <div>
        <div className="Speed">
          {this.statCounter("Speed")}
        </div>
        <div className="Might">
          {this.statCounter("Might")}
        </div>
        <div className="Sanity">
          {this.statCounter("Sanity")}
        </div>
        <div className="Knowledge">
          {this.statCounter("Knowledge")}
        </div>
      </div>
    )
  }
}

export default Stats;
