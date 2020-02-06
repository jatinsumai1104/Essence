var Application = React.createClass({
  getInitialState: function() {
    return {
      orderDetails: {
        orderNumber: "#A61452B",
        status: "shipped",
        shippingLabel: {
          labelCreated: "true",
          labelCreatedDate: {
            month: "May",
            day: "23",
            year: "2017"
          }
        },
        startLocation: {
          address: {
            streetAddress: "123 Start St.",
            city: "Seattle",
            state: "WA"
          },
          date: {
            month: "May",
            day: "23",
            year: "2017"
          },
          status: "current",
          type: "start"
        },
        endLocation: {
          address: {
            streetAddress: "456 End St.",
            city: "New York City",
            state: "NY"
          },
          date: {
            month: "May",
            day: "28",
            year: "2017"
          },
          status: "future",
          type: "end"
        }
      }
    };
  },
  render: function() {
    return (
      <div className="container">
        <div className="row">
          <div className="col s10 offset-s1 m6 offset-m3">
            <div className="card hoverable">
              <header className="card-title center-align">
                <h5>Tracking Details</h5>
                <h6>Order {this.state.orderDetails.orderNumber}</h6>
              </header>
              <Image status={this.state.orderDetails.status} />
              <div className="card-content">
                <Details
                  status={this.state.orderDetails.status}
                  shippingLabel={this.state.orderDetails.shippingLabel}
                  startAddress={this.state.orderDetails.startLocation}
                  endAddress={this.state.orderDetails.endLocation}
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
});

var Image = React.createClass({
  render: function() {
    var imgSrc, width, classes;
    if (this.props.status === "shipped") {
      width = "55%";
      imgSrc =
        "https://s3-us-west-2.amazonaws.com/s.cdpn.io/1206469/delivery-truck%20(1).svg";
      classes = "col offset-s3";
    } else if (this.props.status === "delivered") {
      imgSrc =
        "https://s3-us-west-2.amazonaws.com/s.cdpn.io/1206469/mailbox.svg";
      width = "45%";
      classes = "col offset-s4";
    } else {
      width = "45%";
      classes = "col offset-s4";
      imgSrc = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/1206469/box.svg";
    }
    return (
      <div className="row no-margin-bottom">
        <div className={classes}>
          <img width={width} src={imgSrc} className="icon" />
        </div>
      </div>
    );
  }
});

var Location = React.createClass({
  render: function() {
    var status, styling;
    if (this.props.type === "start") {
      if (this.props.status === "shipped") {
        status = "Shipped";
        styling = "row current margin-top";
      } else {
        status = "Shipped";
        styling = "row complete margin-top";
      }
    } else if (this.props.type === "end") {
      if (this.props.status === "shipped") {
        status = "Estimated";
        styling = "row pending no-margin-bottom margin-top";
      } else {
        status = "Delivered";
        styling = "row current no-margin-bottom margin-top";
      }
    }
    return (
      <div className={styling}>
        <div className="col s8">
          <div>
            {this.props.address.streetAddress}
            <br />
            {this.props.address.city}, {this.props.address.state}
          </div>
        </div>
        <div className="col s4 right-align">
          <date>
            {status}
            <br />
            {this.props.date.month} {this.props.date.day}
          </date>
        </div>
      </div>
    );
  }
});

var NotShipped = React.createClass({
  render: function() {
    return (
      <div className="center-align">Not yet shipped. Check back later!</div>
    );
  }
});

var Details = React.createClass({
  render: function() {
    var shippingDetails;
    if (this.props.status !== "pending") {
      shippingDetails = (
        <ShippingLabelCreated
          labelCreatedDate={this.props.shippingLabel.labelCreatedDate}
          startLocationDetails={this.props.startAddress}
          status={this.props.status}
          endLocationDetails={this.props.endAddress}
        />
      );
    } else {
      shippingDetails = <NotShipped />;
    }
    return <div className="container wide">{shippingDetails}</div>;
  }
});

var ShippingLabelCreated = React.createClass({
  render: function() {
    return (
      <div className="row border-left no-margin-bottom">
        <div className="col s12">
          <div>
            <div className="row complete">
              <div className="col s8">
                <div>Label Created</div>
              </div>
              <div className="col s4 right-align">
                <date>
                  {this.props.labelCreatedDate.month}{" "}
                  {this.props.labelCreatedDate.day}
                </date>
              </div>
            </div>
            <Location
              address={this.props.startLocationDetails.address}
              date={this.props.startLocationDetails.date}
              status={this.props.status}
              type={this.props.startLocationDetails.type}
            />
            <Location
              address={this.props.endLocationDetails.address}
              date={this.props.endLocationDetails.date}
              status={this.props.status}
              type={this.props.endLocationDetails.type}
            />
          </div>
        </div>
      </div>
    );
  }
});

React.render(<Application />, document.getElementById("app"));
