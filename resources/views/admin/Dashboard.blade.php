@extends('layout.layout')
@section('content')
  
      <div class="content">
        <div class="row gy-3 mb-6 justify-content-between">
          <div class="col-md-9 col-auto">
            <h2 class="mb-2 text-body-emphasis">Projects Dashboard</h2>
            <h5 class="text-body-tertiary fw-semibold">Here’s what’s going on at your business right now</h5>
          </div>
          <div class="col-md-3 col-auto">
            <div class="flatpickr-input-container">
              <input class="form-control ps-6 datetimepicker" id="datepicker" type="text" data-options='{"dateFormat":"M j, Y","disableMobile":true,"defaultDate":"Mar 1, 2022"}' /><span class="uil uil-calendar-alt flatpickr-icon text-body-tertiary"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <h6 class="card-title text-muted">Bitcoin (BTC)</h6>
                <h3 class="card-text mb-2">$43,200.00</h3>
                <span class="badge bg-success">+2.5%</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <h6 class="card-title text-muted">Ethereum (ETH)</h6>
                <h3 class="card-text mb-2">$3,200.00</h3>
                <span class="badge bg-danger">-1.2%</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <h6 class="card-title text-muted">Binance Coin (BNB)</h6>
                <h3 class="card-text mb-2">$410.00</h3>
                <span class="badge bg-success">+0.8%</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <h6 class="card-title text-muted">Solana (SOL)</h6>
                <h3 class="card-text mb-2">$110.00</h3>
                <span class="badge bg-success">+4.1%</span>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-header">
            <h5 class="mb-0">Recent Transactions</h5>
          </div>
          <div class="card-body p-0">
            <table class="table mb-0">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Coin</th>
                  <th>Type</th>
                  <th>Amount</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2024-06-10</td>
                  <td>BTC</td>
                  <td>Buy</td>
                  <td>0.05</td>
                  <td><span class="badge bg-success">Completed</span></td>
                </tr>
                <tr>
                  <td>2024-06-09</td>
                  <td>ETH</td>
                  <td>Sell</td>
                  <td>1.2</td>
                  <td><span class="badge bg-warning">Pending</span></td>
                </tr>
                <tr>
                  <td>2024-06-08</td>
                  <td>SOL</td>
                  <td>Buy</td>
                  <td>10</td>
                  <td><span class="badge bg-success">Completed</span></td>
                </tr>
                <tr>
                  <td>2024-06-07</td>
                  <td>BNB</td>
                  <td>Buy</td>
                  <td>5</td>
                  <td><span class="badge bg-danger">Failed</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        @include('layout.footer')
      </div>
      
    
@endsection