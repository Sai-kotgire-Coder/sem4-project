<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget App testing </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        :root{
     ---box-shadow:0 1px 3px rgba(0, 0, 0, 0.12),0 1px 2px rgba(0, 0, 0, 0.24);
             } 
*{
    box-sizing: border-box;
}

body{
    background-color: #fff;
    display: flex;
    flex-direction: column;
    /* align-items:center ; */
    justify-content: center;
    min-height: 100vh;
    margin: 0;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

}

.container{
    margin: 30px auto;
    width: 350px;
}

h1{
    letter-spacing: 1px;
    margin: 0;
}

h3{
    border-bottom: 1px solid #bbb;
    padding-bottom: 10px;
    margin: 40px 0 10px;
}

h4{
    margin: 0;
    text-transform: uppercase;
}

.inc-exp-container{
    background-color: #fff;
    box-shadow: var(---box-shadow);
    padding: 20px;
    display: flex;
    justify-content: center;
    margin: 20px 0 ;
}

.inc-exp-container > div{
    flex:1;
    text-align: center;
}

.inc-exp-container > div:first-of-type{
    border-right: 1px solid #dedede;
}

.money{
    font-size: 2;
    letter-spacing: 1px;
    margin:  5px 0;
}

.money-plus{
    color: #2ecc71;
}
.money-minus{
    color: #c0392b;
}

label{
    display: inline-block;
    margin:10px 0;

}

input[type="text"],input[type="number"]{
    border:1px solid #dedede;
    border-radius: 2px;
    display: block;
    font-size: 16px;
    padding: 10px;
    width:100%;
}

.btn{
    cursor: pointer;
    background-color: #9c88ff;
    box-shadow: var(---box-shadow);
    color: #fff;
    border: 0;
    display: block;
    font-size: 16px;
    margin: 10px 0 30px;
    padding: 10px;
    width: 100%;
}

.btn:focus,.delete-btn:focus{
    outline:0;
}

.list{
    list-style-type: none;
    padding:0;
    margin-bottom: 40px;
}

.list li{
    background-color: #fff;
    box-shadow: var(---box-shadow);
    color: #333;
    display: flex;
    justify-content: space-between;
    position: relative;
    padding: 10px;
    margin: 10px 0;
}

.list li.plus{
    border-right: 5px solid #2ecc71;
}

.list li.minus{
    border-right: 5px solid #c0392b;
}

.delete-btn{
    cursor: pointer;
    background-color: #e74c3c;
    border: 0;
    color:#fff ;
    font-size: 20px;
    line-height:20px;
    padding: 2px 5px;
    position: absolute;
    top:50%;
    left: 0;
    transform: translate(-100%,-50%); 
    opacity:0; 
    transition: opacity 0.3s ease;

}

.list li:hover .delete-btn{
    opacity:1;
}
/* card and discription of budget */
.card{
    border: 1px solid #d3d3d3;
    width: 400px;
    background-color: #ffffff;
    box-shadow: inset;
    border-radius: 14px;
    margin: 50px auto;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}
#safe{
    margin-top: 0px;
    margin-bottom: 50px;
    padding: 0px 10px;
    color: gray;
}
.card-img{
    width: 100%;
    border-radius: 14px;
    padding: 5px;
    box-sizing: border-box;

}
.img{
    height: auto;
    width: 50px;
}
.card-body{
    padding-left:20px;
    margin-top: 0px;
    padding-bottom: 5px;

}
#headding{
    font-family: Arial, Helvetica, sans-serif;
    font-size: x-large;
}
#cuisen{
    font-family: cursive;
}

.safety{
   margin:5px;
   border-top: 1px solid lightgray;
   padding-top: 10px;
}

.card-header{
    position: relative;
}
.b-tag{
    background-color: blue;
    color: #ffffff;
    font-size: 20px;
    padding: 3px 12px;
    position: absolute;
    bottom: 0;
    margin-left: 5px;
    }

.m-tag{
    background-color: rgb(127, 125, 136);
    color: #ffffff;
    font-size: 15px;
    padding: 3px 12px;
    border-radius: 20px;
    position: absolute;
    top: 0;
    margin-top: 20px;
    margin-left: 15px;
}


.t-tag{
    background-color: rgb(252, 252, 252);
    color: #000000;
    font-size: 13px;
    padding: 3px 12px;
    border-radius: 20px;
    position: absolute;
    bottom: 0;
    right: 0;
    margin: 10px;
}
.border{
    border: 1px solid #d3d3d3;
    width: 500px;
    background-color: #ffffff;
    box-shadow: inset;
    border-radius: 14px;
    margin: 50px auto;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.main{
    display:flex;
    gap:20px;
}
.Pcard{
    border: 1px solid #d3d3d3;
    width: 400px;
    height: 500px;
    background-color: #ffffff;
    box-shadow: inset;
    border-radius: 14px;
    margin: 50px auto;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.Pbackground{
    position: relative;
}
.Pimg{
    width: 100%;
    height: 150px;
    border-top-left-radius: 14px;
    border-top-right-radius: 14px;
}
.profp{
    width: 100px;
    height: auto;
    border-radius: 50%;
    position: absolute;
    top: 90px;
    right: 150px;
    border: 8px solid #fff;

}
h1{
    margin-top: 75px;
}
.discription{
    font-size: medium;
    font-family: Arial, Helvetica, sans-serif;
    color: grey;
    margin-left: 120px;

}
p{
    padding:10px;
    margin-top:0px;
}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Expence Tracker</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tracker">Go To Tracker</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#aboutus">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">register</a>
          </li> <li class="nav-item">
            <a class="nav-link" href="logout.php">Log Out</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul> -->
        <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
      </div>
    </div>
  </nav>

    <div class="main">
    <div class="card">
        <div class="card-header">
        <img src="./budgetcard.jpg" alt="" class="card-img">
        <p class="b-tag">promoted</p>
        <p class="m-tag"># Top Skill </p>
        <p class="t-tag"></p>
    </div>
        <div class="card-body">
            <label id="headding">Cash flow per month</label><br>
            <label id="cuisen">Key points of tracking</label>
        </div>
        <div class="safety"> 
            <img src="logo.jpg" alt="" class="img">
            <label id="safe">Budget tracking has several key points, including monitoring all expenditures, examining both fixed and variable costs, recording one-time expenses, reviewing cash flow and ensuring profit. It is also important to regularly review your budget and spending to ensure that you are staying on track with your financial goals. Comprehensive budgeting should include inputs and analysis for revenue,reviewing cash flow and ensuring profit. It is also important to regularly review your budget and spending to ensure costs, cash flow, and working capital. Good budget management software can help to simplify the process of budget tracking and ensure that all expenses are accounted for.</label>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
        <img src="./finance.jpg" alt="" class="card-img">
        <p class="b-tag">Tracking</p>
        <p class="m-tag"># Top Skill </p>
        <p class="t-tag"></p>
    </div>
        <div class="card-body">
            <label id="headding">Finance Featura</label><br>
            <label id="cuisen">Key points of tracking</label>
        </div>
        <div class="safety"> 
            <img src=".jpg" alt="" class="img">
            <label id="safe">Finance refers to the discipline that deals with the management of money and financial transactions. It involves the analysis, planning and management of financial resources to achieve individual, business or organisational goals. Finance covers a wide range of topics, including investments, financial planning, banking, credit, insurance, and accounting. Finance plays a critical role in the economic growth of individuals, businesses and nations, providing the framework for financial decision-making and risk management. A good understanding of finance is essential for anyone seeking to manage their personal finances, run a business or work in the financial services industry.</label>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
        <img src="./savings.jpg" alt="" class="card-img">
        <p class="b-tag">savings</p>
        <p class="m-tag">#Advantage</p>
        <p class="t-tag"></p>
    </div>
        <div class="card-body">
            <label id="headding">Benifits of Savings</label><br>
            <label id="cuisen">Key points of savings</label>
        </div>
        <div class="safety"> 
            <img src="logo.jpg" alt="" class="img">
            <label id="safe">Financial security: Saving money can help provide a financial safety net and give you peace of mind knowing that you have funds available for unexpected expenses.
Earn interest: By saving money in a savings account, you can earn interest on your deposited amount, helping to grow your savings over time.Earn interest: 
Develop financial discipline: Saving money helps you cultivate good financial habits, such as budgeting, and encourages you to think long-term about your financial goals.
Develop financial discipline: Saving money helps you cultivate good financial habits, such as budgeting, and encourages you to think long-term about your financial goals.</label>
        </div>
    </div>
</div>


<div class="border" id="tracker">
    <h2>Expence Tracker</h2>
<div class="container">
    <h4> your balance</h4>
    <h1 id="balance">$0.00</h1>
    <div class="inc-exp-container">
        <div>
            <h4>income</h4>
            <p id="money-plus" class="money-plus">
                +$0.00
            </p>
        </div>

        <div>
            <h4>expence</h4>
            <p id="money-minus" class="money-minus">
                -$0.00
            </p>
        </div>

    </div>
    <h3>History</h3>
    <ul id="list" class="list"> 
        <li class="minus">
            cash <span>-$400</span><button class="delete-btn">x</button>
        </li>
        <li class="minus">
            cash <span>-$500</span><button class="delete-btn">x</button>
        </li>
    </ul>

    <h3>addd newe transaction </h3>
    <form id="form">
<div class="form-control">
    <label for="text">text</label>
    <input type="text" id="text" placeholder="enter text...">
</div>
<div class="form-control">
    <label for="amount">amount</label>
    <input type="number" id="amount" placeholder="enter amount...">
</div>
<button class="btn">
all transactions
</button>
    </form>
</div>
</div>    

<!-- nav bar
footer
about us
home
tracker
login
logout
register -->


<div class="Pcard" id="aboutus">
        <div class="Pbackground">
            <img src="back.jpg" alt="" class="Pimg">
            <div class="profile">
            <img src="pass.jpg" alt="" class="profp">
            </div>
        </div>
        <h1 align="center"  style="margin-top: 20px;">sai kotgire</h1>
        <label align="cneter"class="discription"> student at mgm'c coe</label>
        <p>
        Hello, future website owners! I'm extremely excited to offer my website creation services to you at a fraction of the cost. As a passionate website creator, I strongly believe that every business should have a professional online presence without breaking the bank. Let's work together to bring your unique vision to life and make your online debut unforgettable. Contact me today to start your website journey!</p>
    </div>



    <!-- javascript file -->
    <script>
        //1
const balance = document.getElementById(
    "balance"
  );
  const money_plus = document.getElementById(
    "money-plus"
  );
  const money_minus = document.getElementById(
    "money-minus"
  );
  const list = document.getElementById("list");
  const form = document.getElementById("form");
  const text = document.getElementById("text");
  const amount = document.getElementById("amount");

  const localStorageTransactions = JSON.parse(localStorage.getItem('transactions'));
  
  let transactions = localStorage.getItem('transactions') !== null ? localStorageTransactions : [];
  
  //5
  //Add Transaction
  function addTransaction(e){
    e.preventDefault();
    if(text.value.trim() === '' || amount.value.trim() === ''){
      alert('please add text and amount')
    }else{
      const transaction = {
        id:generateID(),
        text:text.value,
        amount:+amount.value
      }
  
      transactions.push(transaction);
  
      addTransactionDOM(transaction);
      updateValues();
      updateLocalStorage();
      text.value='';
      amount.value='';
    }
  }
  
  
  //5.5
  //Generate Random ID
  function generateID(){
    return Math.floor(Math.random()*1000000000);
  }
  
  //2
  
  //Add Trasactions to DOM list
  function addTransactionDOM(transaction) {
    //GET sign
    const sign = transaction.amount < 0 ? "-" : "+";
    const item = document.createElement("li");
  
    //Add Class Based on Value
    item.classList.add(
      transaction.amount < 0 ? "minus" : "plus"
    );
  
    item.innerHTML = `
      ${transaction.text} <span>${sign}${Math.abs(
      transaction.amount
    )}</span>
      <button class="delete-btn" onclick="removeTransaction(${transaction.id})">x</button>
      `;
    list.appendChild(item);
  }
  
  //4
  
  //Update the balance income and expence
  function updateValues() {
    const amounts = transactions.map(
      (transaction) => transaction.amount
    );
    const total = amounts
      .reduce((acc, item) => (acc += item), 0)
      .toFixed(2);
    const income = amounts
      .filter((item) => item > 0)
      .reduce((acc, item) => (acc += item), 0)
      .toFixed(2);
    const expense =
      (amounts
        .filter((item) => item < 0)
        .reduce((acc, item) => (acc += item), 0) *
      -1).toFixed(2);
  
      balance.innerText=`$${total}`;
      money_plus.innerText = `$${income}`;
      money_minus.innerText = `$${expense}`;
  }
  
  
  //6 
  
  //Remove Transaction by ID
  function removeTransaction(id){
    transactions = transactions.filter(transaction => transaction.id !== id);
    updateLocalStorage();
    Init();
  }
  //last
  //update Local Storage Transaction
  function updateLocalStorage(){
    localStorage.setItem('transactions',JSON.stringify(transactions));
  }
  
  //3
  
  //Init App
  function Init() {
    list.innerHTML = "";
    transactions.forEach(addTransactionDOM);
    updateValues();
  }
  
  Init();
  
  form.addEventListener('submit',addTransaction);

    </script>
</body>
</html>