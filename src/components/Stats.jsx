import React from 'react'
import characterData from './characterData'
import '../css/base.css'

class Stats extends React.Component {

  constructor(props) {
    super(props)
    this.state = {
      character: characterData[this.props.character],
      index: {
        knowledge: characterData[this.props.character]["knowledge"].initial,
        might: characterData[this.props.character]["might"].initial,
        sanity: characterData[this.props.character]["sanity"].initial,
        speed: characterData[this.props.character]["speed"].initial,
      }
    }
  }

  statCounter = (stat) => {
    let character = this.state.character[stat]
    let currentIndex = this.state.index[stat]
    let increaseStat = () => {
      if (currentIndex > 0) {
        this.setState({index: {...this.state.index, [stat]: currentIndex - 1}})
      }
    }
    let decreaseStat = () => {
      if (currentIndex < 8) {
        this.setState({index: {...this.state.index, [stat]: currentIndex + 1}})
      }
    }
    let drawStats = character.values.map((statValue, index) =>
      (currentIndex === index) ?
      <span style={{color: this.state.character.color}}><li key={index}>{statValue}</li></span> :
      <li key={index}>{statValue}</li>
    )
    let upperCaseStatName = stat.replace(/^\w/, (letter) => { return letter.toUpperCase() })
    return(
      <div>
        <p className="statHeader">
          <span style={{color: this.state.character.color }}>{upperCaseStatName}</span></p>
        <div>
          <button onClick={() => increaseStat()}>+</button><br/>
          {drawStats}
          {console.log(this.state)}
          <button onClick={() => decreaseStat()}>-</button><br/>
        </div>
      </div>
    )
  }

render() {
    return (
      <div className="StatsContainer">
        <div className="Portrait">
            <img src={require(`../images/${this.props.character}.jpg`)} />
        </div>
        <div className="Stats">
          <div className="Knowledge">
            {this.statCounter("knowledge")}
          </div>
          <div className="Speed">
            {this.statCounter("speed")}
          </div>
          <div className="Might">
            {this.statCounter("might")}
          </div>
          <div className="Sanity">
            {this.statCounter("sanity")}
          </div>
        </div>
      </div>
    )
  }
}

export default Stats;
