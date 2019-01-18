import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    constructor(){
        super();
        this.state = {
            year: "year",
            month: "month",
            date: "date",
            hour: "hour",
            min : "min",
            sec : "sec"
        };
    }
    
    componentDidMount() {
        let self = this;
        setInterval(function(){
                var d = new Date,
                month = d.getMonth()+1;
                self.setState({
                    year:d.getFullYear().toString(),
                    month:month.toString(),
                    date:d.getDate().toString(),
                    hour:d.getHours().toString(),
                    min:d.getMinutes().toString(),
                    sec:d.getSeconds().toString()
                });
        }, 500);
    }
    
    render() {
        return (
            <div className="container">
                <div className="row">
                    <div className="col-md-8 col-md-offset-2">
                        <div className="panel panel-default">
                            <div className="panel-heading">Example Component</div>

                            <div className="panel-body">
                                I'm an example component!
                                <p>{this.state.year}年{this.state.month}月{this.state.date}日{this.state.hour}時{this.state.min}分{this.state.sec}秒</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
