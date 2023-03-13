<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Payment Log</a></li>
        <li class="breadcrumb-item active" aria-current="page">Payments</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-12">
        <form role="form" id="members-form" method="POST" autocomplete="nope">
            <div class="card">
                <div class="card-body">
                    <form id="payment-form" method="POST" autocomplete="nope" role="form">

                        <div class="row">


                            <div class="col-md-4 mb-5 border border-2 border-success p-4">
                                <h4>HERNARES BRANCH</h4>
                                <div class="row pt-5">
                                    <div class="col-md-4">
                                        <label for="num-hnump" class="form-label">Num of Participants</label>
                                        <input id="num-hnump" class="form-control" name="num-hnump" type="text"  autocomplete="nope" >
                                    </div>
                                    <div class="col-md-8">
                                        <label for="num-hcashr" class="form-label">Cash Receivable</label>
                                        <input id="num-hcashr" class="form-control" name="num-hcashr" type="text"  autocomplete="nope" readonly>
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <label for="num-hchand" class="form-label">Cash on Hand</label>
                                        <input id="num-hchand" class="form-control" name="num-hchand" type="text"  autocomplete="nope"  >
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <label for="num-hbal" class="form-label">  Remaining Balance</label>
                                        <input id="num-hbal" class="form-control" name="num-hbal" type="text"  autocomplete="nope" readonly >
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                    <label for="hpayment-log">Cash Receipts</label>
                                    <textarea class="form-control" id="hpaymentlog" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-5 border border-2 border-success p-4">
                                <h4>ALIJIS BRANCH</h4>
                                <div class="row pt-5">
                                    <div class="col-md-4">
                                        <label for="num-alnump" class="form-label">Num of Participants</label>
                                        <input id="num-alnump" class="form-control" name="num-alnump" type="text"  autocomplete="nope" >
                                    </div>
                                    <div class="col-md-8">
                                        <label for="num-alcashr" class="form-label">Cash Receivable</label>
                                        <input id="num-alcashr" class="form-control" name="num-alcashr" type="text"  autocomplete="nope" readonly>
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <label for="num-alchand" class="form-label">Cash on Hand</label>
                                        <input id="num-alchand" class="form-control" name="num-alchand" type="text"  autocomplete="nope"  >
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <label for="num-albal" class="form-label">  Remaining Balance</label>
                                        <input id="num-albal" class="form-control" name="num-albal" type="text"  autocomplete="nope" readonly >
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                    <label for="alpayment-log">Cash Receipts</label>
                                    <textarea class="form-control" id="alpaymentlog" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 mb-5 border border-2 border-success p-4">
                                <h4>SAGAY BRANCH</h4>
                                <div class="row pt-5">
                                    <div class="col-md-4">
                                        <label for="num-sagnump" class="form-label">Num of Participants</label>
                                        <input id="num-sagnump" class="form-control" name="num-sagnump" type="text"  autocomplete="nope" >
                                    </div>
                                    <div class="col-md-8">
                                        <label for="num-sagcashr" class="form-label">Cash Receivable</label>
                                        <input id="num-sagcashr" class="form-control" name="num-sagcashr" type="text"  autocomplete="nope" readonly>
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <label for="num-sagchand" class="form-label">Cash on Hand</label>
                                        <input id="num-sagchand" class="form-control" name="num-sagchand" type="text"  autocomplete="nope"  >
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <label for="num-sagbal" class="form-label">  Remaining Balance</label>
                                        <input id="num-sagbal" class="form-control" name="num-sagbal" type="text"  autocomplete="nope" readonly >
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                    <label for="sagpayment-log">Cash Receipts</label>
                                    <textarea class="form-control" id="sagpaymentlog" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">


                        <div class="col-md-4 mb-5 border border-2 border-success p-4">
                                <h4>POTOTAN BRANCH</h4>
                                <div class="row pt-5">
                                    <div class="col-md-4">
                                        <label for="num-potnump" class="form-label">Num of Participants</label>
                                        <input id="num-potnump" class="form-control" name="num-potnump" type="text"  autocomplete="nope" >
                                    </div>
                                    <div class="col-md-8">
                                        <label for="num-potcashr" class="form-label">Cash Receivable</label>
                                        <input id="num-potcashr" class="form-control" name="num-potcashr" type="text"  autocomplete="nope" readonly>
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <label for="num-potchand" class="form-label">Cash on Hand</label>
                                        <input id="num-potchand" class="form-control" name="num-potchand" type="text"  autocomplete="nope"  >
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <label for="num-potbal" class="form-label">  Remaining Balance</label>
                                        <input id="num-potbal" class="form-control" name="num-potbal" type="text"  autocomplete="nope" readonly >
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                    <label for="potpayment-log">Cash Receipts</label>
                                    <textarea class="form-control" id="paymentlog" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-5 border border-2 border-success p-4">
                                <h4>SILAY BRANCH</h4>
                                <div class="row pt-5">
                                    <div class="col-md-4">
                                        <label for="num-silnump" class="form-label">Num of Participants</label>
                                        <input id="num-silnump" class="form-control" name="num-silnump" type="text"  autocomplete="nope" >
                                    </div>
                                    <div class="col-md-8">
                                        <label for="num-silcashr" class="form-label">Cash Receivable</label>
                                        <input id="num-silcashr" class="form-control" name="num-silcashr" type="text"  autocomplete="nope" readonly>
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <label for="num-silchand" class="form-label">Cash on Hand</label>
                                        <input id="num-silchand" class="form-control" name="num-silchand" type="text"  autocomplete="nope"  >
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <label for="num-silbal" class="form-label">  Remaining Balance</label>
                                        <input id="num-silbal" class="form-control" name="num-silbal" type="text"  autocomplete="nope" readonly >
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                    <label for="silpayment-log">Cash Receipts</label>
                                    <textarea class="form-control" id="silpaymentlog" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 mb-5 border border-2 border-success p-4">
                                <h4>SIPALAY BRANCH</h4>
                                <div class="row pt-5">
                                    <div class="col-md-4">
                                        <label for="num-sipnump" class="form-label">Num of Participants</label>
                                        <input id="num-sipnump" class="form-control" name="num-sipnump" type="text"  autocomplete="nope" >
                                    </div>
                                    <div class="col-md-8">
                                        <label for="num-sipcashr" class="form-label">Cash Receivable</label>
                                        <input id="num-sipcashr" class="form-control" name="num-sipcashr" type="text"  autocomplete="nope" readonly>
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <label for="num-sipchand" class="form-label">Cash on Hand</label>
                                        <input id="num-sipchand" class="form-control" name="num-sipchand" type="text"  autocomplete="nope"  >
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <label for="num-sipbal" class="form-label">  Remaining Balance</label>
                                        <input id="num-sipbal" class="form-control" name="num-sipbal" type="text"  autocomplete="nope" readonly >
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-md-12">
                                    <label for="sippayment-log">Cash Receipts</label>
                                    <textarea class="form-control" id="sippaymentlog" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>

                   


                <div class="card-footer mt-5">
                   

                    
                    <div class="row justify-content-end mt-4">
                            <div class="col-md-4  border-5 d-flex justify-content-end align-items-center text-center">
                                <p>Total Cash on Hand</p>
                            </div>
                    
                            <div class="col-md-4  border-5">
                                <input id="num-tchand" class="form-control" name="num-tchand" type="text"  autocomplete="nope" readonly>
                            </div>
                    </div>

                    <div class="row justify-content-end mt-4">

                            <div class="col-md-4  border-5 d-flex justify-content-end align-items-center text-center">
                                <p>Total Cash Receivable</p>
                        </div>
                    
                        <div class="col-md-4  border-5">
                            <input id="num-tcashr" class="form-control" name="num-tcashr" type="text"  autocomplete="nope" readonly>
                        </div>
                    </div>

                    <div class="row justify-content-end mt-4">
                        <div class="col-md-4  border-5 d-flex justify-content-end align-items-center text-center">
                            <p>Total Remaining Balance</p>
                        </div>
                    
                        <div class="col-md-4  border-5 ">
                            <input id="num-tbal" class="form-control" name="num-tbal"num-tbal type="text"  autocomplete="nope" readonly>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col"></div>
                        
                            <div class="col-auto">
                                
                                
                                <div class="float-sm-left">

                                    <button type="submit" class="btn btn-primary btn-rounded px-4"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
      

                                        
                                </div>
                            </div> 
                        </div>
                </div> <!-- end footer -->



                </div>
            </div>
        </form>
    </div>           
</div>