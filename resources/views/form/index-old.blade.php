<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/signature/css/signature-pad.css')}}" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <title>Quality Assurance - Home Visit</title>
    <style>
        .hidden {
            display: none;
        }

        .mt-24 {
            margin-top: -24px;
        }

        lable {
            text-transform: initial;
        }

        #toastr {
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 30px;
            border-radius: 8px;
            display: none;
            margin-top: 10px;
            margin-bottom: 25px;
        }

        #toastr.success {
            background-color: rgba(40, 167, 69, .8);
        }

        #toastr.error {
            background-color: rgba(220, 53, 69, .8);
        }
        .card-header
        {
            background-color: #F7F7F7;
        }
        .form input[type="email"], .form input[type="password"], .form input[type="text"], .form select, .form textarea {
            border: 1px solid #ab8787 !important;
        }
    </style>
</head>

<body>

    <div class="header">
        {{--<h1><img src="{{asset('images/logo.png')}}" /></h1>--}}
        <h1><img src="{{asset('/assets/img/logo.png')}}" /></h1>
    </div>
    <div class="container">
        <div class="form">

            <div class="head-1 text-center">
                <h1>Quality Assurance Home Visit</h1>
            </div>
            <div id="toastr" class="success">
                @if(isset(request()->status))
                Form Saved As Drfat, Edit and Submit Now!', 'success
                @else
                Data saved
                @endif
            </div>
            <form method="post" action="{{route('client.form.submit')}}" class="accordion" id="formValues">
                @csrf
                <div class="card shadow-box">
                    <div class="card-header">
                        <button class="btn btn-link" type="button" data-toggle="collapse"> <span>1</span> Quality Assurance Visit Details
                            <img src="{{asset('assets/img/arrow-down1.png')}}" alt="" />
                        </button>
                    </div>
                    <div id="card-1" class="bg-white collapse show" aria-labelledby="property-info" data-parent="#formValues">
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label>Clients Name</label>
                                <input type="text" name="client_name" readonly="" value="{{$client->name}}" class="text-dark font-weight-bold">
                            </div>
                            <div class="col-lg-6">
                                <label> Clients Number</label>
                                <input type="text" name="client_number" readonly value="{{$client->id_number}}" class="required-field border-clr text-dark font-weight-bold">
                            </div>
                            <div class="col-lg-6">
                                <label>Clients Date of Birth</label>
                                <div class="input-group ">
                                    <input name="client_dob" readonly value="{{date('d/m/Y',strtotime($client->dob))}}" type="text" class="form-control ">
                                    <div class="input-group-addon"> <span class="glyphicon glyphicon-th"></span></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>QA Visit Date</label>
                                <div class="input-group ">
                                    <input name="qa_visit_date" value="{{\Carbon\Carbon::today()->format('d/m/Y')}}" type="text" class="form-control required-field border-clr" readonly>
                                    <div class="input-group-addon"> <span class="glyphicon glyphicon-th"></span></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Client Type</label>
                                <input type="text" name="category" value="{{$client->type ?? ''}}" readonly="">
                                {{--<select name="category" id="category" class="required-field">
                                    <option value="">Pick from Drop Down</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->category}}">{{$category->category}}</option>
                                    @endforeach
                                </select>--}}
                            </div>
                            <div class="col-lg-6">
                                <label>County</label>
                                <input type="text" readonly name="county" value="{{$client->county}}" class="required-field ">
                            </div>
                            <div class="col-lg-6">
                                <label>Locality</label>
                                <input type="text" readonly name="locality" value="{{$client->locality}}" class="required-field ">
                            </div>
                            <div class="col-lg-6">
                                <label>Province</label>
                                <input type="text" readonly name="province" value="{{$client->province ?? ''}}" class="required-field ">
                            </div>
                            <div class="col-lg-6">
                                <label>Client Condition</label>
                                <input type="text" name="client_health_diagnose" value="{{$client->condition ?? ''}}" readonly="">
                                {{--<select name="client_health_diagnose" class="required-field health_diagnose">
                                    <option value="">Pick from Drop Down</option>
                                    @foreach($diagnoses as $diagnose)
                                    <option value="{{$diagnose->diagnose}}">{{$diagnose->diagnose}}</option>
                                    @endforeach
                                </select>--}}
                            </div>
                            <div class="col-lg-6">
                                <label>Visit Type</label>
                                <select name="visit_type" class="required-field">
                                    <option value="">Pick from Drop Down</option>
                                    @foreach($visit_type as $type)
                                    <option value="{{$type->name}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="client_id" value="{{$client->id_number}}">

                            <div class="col-lg-6">
                                <label>Care Start Date</label>
                                <div class="input-group">
                                    <input name="care_start_date" readonly value="{{date('d/m/Y',strtotime($client->care_start_date))}}" type="text" class="form-control">
                                    <div class="input-group-addon"> <span class="glyphicon glyphicon-th"></span></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                @php
                                $diff=\Carbon\Carbon::parse($client->care_start_date)->diffInMonths(\Carbon\Carbon::today()->format('Y-m-d'));
                                @endphp

                                <label>Duration of care</label>
                                <div class="input-group ">
                                    <input name="duration_of_visit" readonly value="{{$diff}}" type="text" class="form-control required-field">
                                    <div class="input-group-addon"> <span class="glyphicon glyphicon-th"></span></div>
                                </div>
                            </div>
                            <div class="col-lg-12 signature">
                                <label>Client Signature</label>
                                <div id="signature-pad" class="signature-pad">
                                    <div class="signature-pad--body">
                                        <canvas></canvas>
                                    </div>
                                    <div class="signature-pad--footer">
                                        <div class="description">Sign above</div>
                                        <div class="signature-pad--actions">
                                            <div>
                                                <button type="button" class="signature-button" data-action="clear">Clear</button>
                                                <button type="button" class="signature-button" data-action="change-color">Change color</button>
                                                <button type="button" class="signature-button" data-action="undo">Undo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="client_signature"></div>
                            <div class="col-lg-12">
                                <label>Care Manager</label>
                                <select name="care_manager_id" class="required-field">
                                    <option value="">Pick from Drop Down</option>
                                    @foreach($care_manager as $manager)
                                    <option value="{{$manager->id}}">{{$manager->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 signature">
                                <label>CAREManager Signature</label>
                                <div id="signature-pad2" class="signature-pad">
                                    <div class="signature-pad--body">
                                        <canvas></canvas>
                                    </div>
                                    <div class="signature-pad--footer">
                                        <div class="description">Sign above</div>
                                        <div class="signature-pad--actions">
                                            <div>
                                                <button type="button" class="signature-button" data-action="clear2">Clear</button>
                                                <button type="button" class="signature-button" data-action="change-color2">Change color</button>
                                                <button type="button" class="signature-button" data-action="undo2">Undo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="cm_signature"></div>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-center justify-content-sm-end col-lg-12">
                                <button type="button" class="primary-btn validate" data-id="1">Next Step</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-box incomplete">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" aria-expanded="false">
                                <div class="float-left text-left"><span class="float-left">2</span> Performance & Quality Confirmation </div>
                                <img src="{{asset('assets/img/arrow-down1.png')}}" alt="" />
                            </button>
                        </h2>
                    </div>
                    <div id="card-2" class="bg-white collapse" aria-labelledby="property-sold" data-parent="#formValues">
                        <div class="row mt-2 outer-wrap" id="cart-item-1">
                            <div class="col-md-12 m2-5">
                                <h2 class="head-1">
                                    <span><i class="fa fa fa-tasks"></i></span> CAREGIVER <font class="item-count">1</font>
                                </h2>
                            </div>
                            <div class="col-lg-6 care_giver_id">
                                <label>Care Giver ID </label>
                                <input type="text" name="care_giver_id[]" class="fl-3 required-field  " />
                                <button type="button" class="btn search-care-giver" style="position: absolute;right: 18px;margin-top: 3.5px;background-color: #62194F;"><i class="fa fa-search text-white"></i> </button>
                            </div>
                            <div class="col-lg-6 care_giver_name">
                                <label>Care Giver Name </label>
                                <input type="text" name="care_giver_name[]" readonly class="fl-3 required-field " />
                            </div>
                            <div class="col-lg-6">
                                <label>Kind and caring attitude?</label>
                                <select name="attitude[]" class="required-field review">
                                    <option value="">Select Score</option>
                                    <?php for ($i = 1; $i <= 10; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>Competent ; Ability to Perform Care Needs?</label>
                                <select name="ability[]" class="required-field review">
                                    <option value="">Select Score</option>
                                    <?php for ($i = 1; $i <= 10; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>Punctual , Reliable, and Dependable?</label>
                                <select name="reliability[]" class="required-field review">
                                    <option value="">Select Score</option>
                                    <?php for ($i = 1; $i <= 10; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>Average</label>
                                <input type="text" name="Average_giver[]" class="fl-3 average" readonly />
                            </div>
                            <div class="col-lg-12">
                                <label>Comment</label>
                                <textarea type="text" name="CG_comment[]" rows="3"></textarea>
                            </div>

                        </div>

                        <div id="cart-items"></div>
                        <div class="d-flex justify-content-center justify-content-sm-end col-lg-12">
                            <button class="primary-btn add-more" type="button"><i class="fa fa-plus"></i> Add Another</button>
                        </div>
                        <div class="col-lg-12">
                            <label>Total average CAREGivers (auto)Average</label>
                            <input type="text" name="Average_giver_total" class="fl-3 total_average total_average2" readonly />
                        </div>
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between col-lg-12">
                            <button type="button" class="outline-btn  back" data-id="2">
                                <img src="assets/img/left-arrow.svg" alt="" />Back</button>
                                <button type="button" class="primary-btn careGivers validate" data-id="2">Next Step</button>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-box incomplete">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" aria-expanded="false" aria-controls="landSold">
                                    <div class="float-left text-left"><span class="float-left num">3</span> CAREManager & Office support</div>
                                    <img src="{{asset('assets/img/arrow-down1.png')}}" alt="" />
                                </button>
                            </h2>
                        </div>
                        <div id="card-3" class="collapse bg-white  " aria-labelledby="land-sold" data-parent="#formValues">
                            <div class="row mt-2">
                                <div class="col-lg-6">
                                    <label>CAREManager </label>
                                    <input type="text" name="care_manager" readonly />
                                </div>
                                <div class="col-lg-6">
                                    <label>Kind and caring attitude?</label>
                                    <select name="Cm_attitud" class="required-field review">
                                        <option value="">Select Score</option>
                                        <?php for ($i = 1; $i <= 10; $i++) {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Competent , Ability to Perform Care Needs?</label>
                                    <select name="Cm_ability" class="required-field review">
                                        <option value="">Select Score</option>
                                        <?php for ($i = 1; $i <= 10; $i++) {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Punctual , Reliable and Dependable?</label>
                                    <select name="Cm_reliability" class="required-field review">
                                        <option value="">Select Score</option>
                                        <?php for ($i = 1; $i <= 10; $i++) {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <label>Comment</label>
                                    <textarea type="text" name="Cm_comment" rows="3"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <label>Average CAREManager </label>
                                    <input type="text" class="average total_average2" name="Cm_average" readonly />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="head-1"> Office Support </h3>
                                </div>
                                <div class="col-lg-6">
                                    <label>Courteous and helpful?</label>
                                    <select name="Off_help" class="required-field review">
                                        <option value="">Select Score</option>
                                        <?php for ($i = 1; $i <= 10; $i++) {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Provide prompt service with enquiries / requests ?</label>
                                    <select name="Off_service" class="required-field review">
                                        <option value="">Select Score</option>
                                        <?php for ($i = 1; $i <= 10; $i++) {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Competent and Communicates Scheduling</label>
                                    <select name="Off_communication" class="required-field review">
                                        <option value="">Select Score</option>
                                        <?php for ($i = 1; $i <= 10; $i++) {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Average Office Support</label>
                                    <input type="text" class="average total_average2 " name="Off_average" readonly />
                                </div>
                                <div class="col-lg-12">
                                    <label>Comment</label>
                                    <textarea type="text" name="Off_comment" rows="3"></textarea>
                                </div>

                                <div class="col-lg-6">
                                    <label>Overall Customer Satisfaction Score (CSAT) %</label>
                                    <input type="text" name="CSAT" class="CSAT" readonly />
                                </div>
                                <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between col-lg-12">
                                    <button type="button" class="outline-btn back" data-id="3">
                                        <img src="assets/img/left-arrow.svg" alt="" />Back</button>
                                        <button type="button" class="primary-btn  validate" data-id="3">Next Step</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-box incomplete">
                            <div class="card-header" id="land-info">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" aria-expanded="false">
                                        <div class="float-left text-left"><span class="float-left num">4</span> Service Advocacy</div>
                                        <img src="{{asset('assets/img/arrow-down1.png')}}" alt="" />
                                    </button>
                                </h2>
                            </div>
                            <div id="card-4" class="collapse bg-white  " aria-labelledby="land-info" data-parent="#formValues">
                                <div class="row mt-2">
                                    <div class="col-lg-6">
                                        <label>Who</label>
                                        <select name="Who" class="required-field ">
                                            <option value="" disabled selected></option>
                                            @foreach($who as $wh)
                                            <option value="{{$wh->who}}" >{{$wh->who}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Name</label>
                                        <input type="text" name="adv_name" class="required-field" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Expectations</label>
                                        <select name="Expectations" class="required-field">
                                            <option value="" disabled selected></option>
                                            @foreach($expectations as $expectation)
                                            <option value="{{$expectation->expect}}" >{{$expectation->expect}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Overall Value Of Service - Please Discuss</label>
                                        <input type="text" name="adv_disc" placeholder="Please Discuss" class="required-field" />
                                    </div>
                                    <div class="col-lg-12">
                                        <label>How likely are you to recommend HISC to a friend (from a scale of 1- 10)</label>
                                        <select name="adv_rec" class="required-field ">
                                            <option value="">Select Score</option>
                                            <?php for ($i = 1; $i <= 10; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Comment</label>
                                        <textarea type="text" name="adv_comment" rows="3"></textarea>
                                    </div>
                                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between col-lg-12">
                                        <button type="button" class="outline-btn  back" data-id="4">
                                            <img src="assets/img/left-arrow.svg" alt="" />Back</button>
                                            <button type="button" class="primary-btn  validate" data-id="4">Next Step</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-box incomplete">
                                <div class="card-header">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" aria-expanded="false">
                                            <div class="float-left text-left"><span class="float-left num">5</span> Client Profile</div>
                                            <img src="{{asset('assets/img/arrow-down1.png')}}" alt="" />
                                        </button>
                                    </h2>
                                </div>
                                <div id="card-5" class="collapse bg-white  " aria-labelledby="" data-parent="#formValues">
                                    <div class="row mt-2">
                                        <div class="col-lg-6">
                                            <label>Quality of Life</label>
                                            <select name="Quality_of_Life" class="required-field">
                                                <option value="" disabled selected></option>
                                                @foreach($quality as $qual)
                                                <option value="{{$qual->quality}}" >{{$qual->quality}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-12">
                                            <h3 class="head-1">Details Of Client Profile Changes (Any Changes Of Hours, Health etc)</h3>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Details</label>
                                            <input type="text" name="Cp_details" class="required-field" />
                                        </div>
                                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between col-lg-12">
                                            <button type="button" class="outline-btn  back" data-id="5">
                                                <img src="assets/img/left-arrow.svg" alt="" />Back</button>
                                                <button type="button" class="primary-btn   validate" data-id="5">Next Step</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow-box incomplete">
                                    <div class="card-header">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" aria-expanded="false">
                                                <div class="float-left text-left"><span class="float-left num">6</span> Solving a Need / Any Additional Hours or Services Required?</div>
                                                <img src="{{asset('assets/img/arrow-down1.png')}}" alt="" />
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="card-6" class="collapse bg-white  " aria-labelledby="six" data-parent="#formValues">
                                        <div class="row mt-2">
                                            <div class="col-lg-12">
                                                <label>Review Care Needs</label>
                                                <input type="text" name="review_care_needs" />
                                            </div>
                                            <div class="col-lg-12">
                                                <label>Review Care Plan</label>
                                                <input type="text" name="review_care_plan" />
                                            </div>
                                            <div class="col-lg-12">
                                                <label>Expand on Unmet Needs</label>
                                                <input type="text" name="expand_on_unmet_needs" />
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Other Service Assistance Required? Yes/No </label>
                                                <select name="add_other_yes" class="add_other_yes required-field">
                                                    <option value=""></option>
                                                    <option value="Yes">Yes</option>
                                                    <option selected value="No">No</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 show-on-yes hidden">
                                                <label>Medi-Set Type </label>
                                                <select name="add_other" class="add_other ">
                                                    <option value="" disabled selected></option>
                                                    @foreach($assistance as $ass)
                                                    <option value="{{$ass->assistance}}" >{{$ass->assistance}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-12">
                                                <label>Agree Updated Schedule/Capture Next Steps</label>
                                                <input type="text" name="agree_update_next_schedule" />
                                            </div>
                                            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between col-lg-12">
                                                <button type="button" class="outline-btn  back" data-id="6">
                                                    <img src="assets/img/left-arrow.svg" alt="" />Back</button>
                                                    <button type="button" class="primary-btn   validate" data-id="6">Next Step</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow-box incomplete">
                                        <div class="card-header">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" aria-expanded="false">
                                                    <div class="float-left text-left"><span class="float-left num">7</span> Service Review</div>
                                                    <img src="{{asset('assets/img/arrow-down1.png')}}" alt="" />
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="card-7" class="collapse bg-white  " aria-labelledby="land-info" data-parent="#formValues">
                                            <div class="row mt-2">
                                                <div class="col-lg-6">
                                                    <label>Do CAREGivers Deal With Meds?</label>
                                                    <select name="Cg_meals" class="Sr-1 med required-field">
                                                        <option value=""></option>
                                                        <option value="yes">Yes</option>
                                                        <option selected value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 medi-set hidden">
                                                    <label>MEDI-SET TYPE</label>
                                                    <input type="text" name="Medi_set_type" class="fl-3 " />

                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6 ">
                                                            <label>Do CAREGivers Have a Home Key ?</label>
                                                            <select name="Cg_hm_key" class="selected1 required-field">
                                                                <option value=""></option>
                                                                <option value="Yes">Yes</option>
                                                                <option selected value="No">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 hide-on-no hidden">
                                                            <label>Key form Signed ? </label>
                                                            <select name="Cg_hm_key_sign" class="Sr-1 required-field">
                                                                <option value=""></option>
                                                                <option value="Yes">Yes</option>
                                                                <option selected value="No">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Key Safe Information Provided ?</label>
                                                            <select name="Cg_key_info" class="selected1 required-field">
                                                                <option value=""></option>
                                                                <option value="yes">Yes</option>
                                                                <option selected value="No">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 hide-on-no hidden">
                                                            <label>Client Key Safe ? </label>
                                                            <select name="Cg_key_info_safe" class="Sr-1 required-field">
                                                                <option value=""></option>
                                                                <option value="yes">Yes</option>
                                                                <option selected value="No">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Bath Hoist?</label>
                                                            <select name="bath_hoist" class="selected1 required-field">
                                                                <option value=""></option>
                                                                <option value="yes">Yes</option>
                                                                <option selected value="No">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 hide-on-no hidden">
                                                            <label>Service Date</label>
                                                            <div class="input-group date" data-provide="datepicker">
                                                                <input name="bt_hoist_service_date" type="text" class="form-control ">
                                                                <div class="input-group-addon"> <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Stairlift?</label>
                                                            <select name="starlift" class="selected1 required-field">
                                                                <option value=""></option>
                                                                <option value="yes">Yes</option>
                                                                <option selected value="No">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 hide-on-no hidden">
                                                            <label>Service Date</label>
                                                            <div class="input-group date" data-provide="datepicker">
                                                                <input name="starlift_service_date" type="text" class="form-control ">
                                                                <div class="input-group-addon"> <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Hoist ?</label>
                                                            <select name="hoist" class="selected1 required-field">
                                                                <option value=""></option>
                                                                <option value="yes">Yes</option>
                                                                <option selected value="No">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 hide-on-no hidden">
                                                            <label>Service Date</label>
                                                            <div class="input-group date" data-provide="datepicker">
                                                                <input name="hoist_service_date" type="text" class="form-control ">
                                                                <div class="input-group-addon"> <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Profile bed ?</label>
                                                    <select name="profile_bed" class=" required-field">
                                                        <option value=""></option>
                                                        <option value="yes">Yes</option>
                                                        <option selected value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>E Wheelchair?</label>
                                                    <select name="Ewchair" class=" required-field">
                                                        <option value=""></option>
                                                        <option value="yes">Yes</option>
                                                        <option selected value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label>Other</label>
                                                    <input type="text" name="Sr_other"></input>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label>Follow Up Actions</label>
                                                    <input type="text" name="Sr_follow_up"></input>
                                                </div>
                                                <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between col-lg-12">
                                                    <button type="button" class="outline-btn  back" data-id="7">
                                                        <img src="assets/img/left-arrow.svg" alt="" />Back</button>
                                                        <button type="button" class="primary-btn   validate" data-id="7">Next Step</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card shadow-box incomplete">
                                            <div class="card-header" id="">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" aria-expanded="false">
                                                        <div class="float-left text-left"><span class="float-left num">8</span> Client Journal & House inspection</div>
                                                        <img src="{{asset('assets/img/arrow-down1.png')}}" alt="" />
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="card-8" class="collapse bg-white  " aria-labelledby="" data-parent="#formValues">
                                                <div class="row mt-2">

                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 ">
                                                                <label>Home Environment Safe & Hygienic ?</label>
                                                                <select name="Hygine" class="selected2 required-field">
                                                                    <option value=""></option>
                                                                    <option selected value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 show-on-no hidden">
                                                                <label>Home Env Details</label>
                                                                <input name="Hygine_detail" type="text" placeholder="Enter Details"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 ">
                                                                <label>Client Journal Accessible Yes / No?</label>
                                                                <select name="Cjournal" class="selected2 required-field">
                                                                    <option value=""></option>
                                                                    <option selected value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 show-on-no hidden">
                                                                <label>Journal Details</label>
                                                                <input name="Cj_detail" type="text" placeholder="Enter Details"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 ">
                                                                <label>Preference Sheets Done ?</label>
                                                                <select name="pref_sheet" class="selected2 required-field">
                                                                    <option value=""></option>
                                                                    <option selected value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 show-on-no hidden">
                                                                <label>Preference Sheet Details</label>
                                                                <input name="Pref_sheet_detail" type="text" placeholder="Enter Details"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 ">
                                                                <label>Logs Removed / Binder Refill ?</label>
                                                                <select name="refill" class="selected2 required-field">
                                                                    <option value=""></option>
                                                                    <option selected value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 show-on-no hidden">
                                                                <label>Logs and Binder Details</label>
                                                                <input name="refill_detail" type="text" placeholder="Enter Details"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 ">
                                                                <label>Journal meds guidelines ?</label>
                                                                <select name="guidline" class="selected2 required-field">
                                                                    <option value=""></option>
                                                                    <option selected value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 show-on-no hidden">
                                                                <label>Journal Meds Details</label>
                                                                <input name="guidline_detail" type="text" placeholder="Enter Details"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 ">
                                                                <label>Time In / Time Out Recorded Ok?</label>
                                                                <select name="time_in" class="selected2 required-field">
                                                                    <option value=""></option>
                                                                    <option selected value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 show-on-no hidden">
                                                                <label>Time In / Out Details</label>
                                                                <input name="time_in_detail" type="text" placeholder="Enter Details"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 ">
                                                                <label>CAREGiver Content Log Ok ?</label>
                                                                <select name="Cg_content_log" class="selected2 required-field">
                                                                    <option value=""></option>
                                                                    <option selected value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 show-on-no hidden">
                                                                <label>CAREGIVER Content Details</label>
                                                                <input name="Cg_content_log_detail" type="text" placeholder="Enter Details"  />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <label>Comment</label>
                                                        <textarea type="text" name="Cj_comment"></textarea>
                                                    </div>
                                                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between col-lg-12">
                                                        <button type="button" class="outline-btn back" data-id="8">
                                                            <img src="assets/img/left-arrow.svg" alt="" />Back</button>
                                                            <button type="button" class="primary-btn   validate" data-id="8">Next Step</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card shadow-box incomplete">
                                                <div class="card-header" id="">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" aria-expanded="false">
                                                            <div class="float-left text-left"><span class="float-left num">9</span> For Office Use Only</div>
                                                            <img src="{{asset('assets/img/arrow-down1.png')}}" alt="" />
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="card-9" class="collapse bg-white  " aria-labelledby="land-sold" data-parent="#formValues">
                                                    <div class="row mt-2">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-6 ">
                                                                    <label>Compatible / Communicates with Client</label>
                                                                    <select name="Compatible" class="selected2 required-field">
                                                                        <option value=""></option>
                                                                        <option selected value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6 show-on-no hidden">
                                                                    <label>Details</label>
                                                                    <input name="Compatible_detail" type="text" placeholder="Enter Details" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-6 ">
                                                                    <label>Reliable & Dependable</label>
                                                                    <select name="dependable" class="selected2 required-field">
                                                                        <option value=""></option>
                                                                        <option selected value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6 show-on-no hidden">
                                                                    <label>Details</label>
                                                                    <input name="dependable_detail" type="text" placeholder="Enter Details" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-6 ">
                                                                    <label>Capable of Providing Req'd Care</label>
                                                                    <select name="capable" class="selected2 required-field">
                                                                        <option value=""></option>
                                                                        <option selected value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6 show-on-no hidden">
                                                                    <label>Details</label>
                                                                    <input name="capable_detail" type="text" placeholder="Enter Details" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label>Recommendable for more Hrs</label>
                                                            <input name="recomm" type="text" />
                                                        </div>
                                                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between col-lg-12">
                                                            <button type="button" class="outline-btn back" data-id="9">
                                                                <img src="assets/img/left-arrow.svg" alt="" />Back</button>
                                                                <button type="button" class="primary-btn    validate" data-id="9">Next Step</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card shadow-box incomplete">
                                                    <div class="card-header" id="">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" aria-expanded="false">
                                                                <div class="float-left text-left"><span class="float-left num">10</span> Upskilling / Training Needs (include Refresher Training)</div>
                                                                <img src="{{asset('assets/img/arrow-down1.png')}}" alt="" />
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="card-10" class="collapse bg-white  " aria-labelledby="" data-parent="#formValues">
                                                        <div class="row mt-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-6 ">
                                                                        <label>Dementia</label>
                                                                        <select name="Dementia" class="selected1">
                                                                            <option value="No" selected="selected">No</option>
                                                                            <option value="Yes">Yes</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-12 carer hide-on-no hidden">
                                                                        <label> CAREGivers</label>
                                                                        <ul class="ul1 float-left">

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-6 ">
                                                                        <label>PM & H</label>
                                                                        <select name="pmh" class="selected1">
                                                                            <option value="No" selected="selected">No</option>
                                                                            <option value="Yes">Yes</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-12 carer hide-on-no hidden">
                                                                        <label> CAREGivers</label>
                                                                        <ul class="ul2 float-left">

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-6 ">
                                                                        <label>CATHETER CARE</label>
                                                                        <select name="Cater_care" class="selected1">
                                                                            <option value="No" selected="selected">No</option>
                                                                            <option value="Yes">Yes</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-12 carer hide-on-no hidden">
                                                                        <label>CAREGivers</label>
                                                                        <ul class="ul3 float-left">

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-6 ">
                                                                        <label>Personal Care</label>
                                                                        <select name="per_care" class="selected1">
                                                                            <option value="No" selected="selected">No</option>
                                                                            <option value="Yes">Yes</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-12 carer hide-on-no hidden">
                                                                        <label> CAREGivers</label>
                                                                        <ul class="ul4 float-left">

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-6 ">
                                                                        <label>MEAL PREPARATIONS</label>
                                                                        <select name="meal_prep" class="selected1">
                                                                            <option value="No" selected="selected">No</option>
                                                                            <option value="Yes">Yes</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-12 carer hide-on-no hidden">
                                                                        <label> CAREGivers</label>
                                                                        <ul class="ul5 float-left">

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-6 ">
                                                                        <label>Stoma Care</label>
                                                                        <select name="st_care" class="selected1">
                                                                            <option value="No" selected="selected">No</option>
                                                                            <option value="Yes">Yes</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-12 carer hide-on-no hidden">
                                                                        <label> CAREGivers</label>
                                                                        <ul class="ul6 float-left">

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>PP updated</label>
                                                                <select name="pp_update">
                                                                    <option value="Yes" selected="selected">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 ">
                                                                <label>Date</label>
                                                                <input name="pp_date" value="" type="text" class="required-field date">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Other</label>
                                                                <input type="text" name="train_other">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Notes</label>
                                                                <input name="train_note" type="text">
                                                            </div>
                                                            <input type="hidden" id="client_record_id" name="client_record_id" value="{{ base64_decode(request()->status) ?? '' }}">
                                                            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between col-lg-12">
                                                                <button type="button" class="outline-btn back" data-id="10">
                                                                    <img src="assets/img/left-arrow.svg" alt="" />Back</button>
                                                                    <button id="save_draft" type="button" class="primary-btn form_btn">Save As Draft</button>
                                                                    <button id="submit" type="button" class="primary-btn form_btn">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <footer>
                                                <p>Copyright &copy; 2021, Digital Lean Solutions. All rights reserved </p>
                                            </footer>
                                        </div>
                                        <!-- js -->
                                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
                                        <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
                                        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
                                        <script src="{{asset('assets/signature/js/signature_pad.umd.js')}}"></script>
                                        <script src="{{asset('assets/signature/js/app.js')}}"></script>
                                        <script src="{{asset('assets/signature/js/app2.js')}}"></script>
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
                                        <script type="text/javascript">
                                            var button_clicked_id;
                                            var edit_flag = false;
                                            $(document).on("click", ".form_btn", function(){
                                                button_clicked_id = $(this).attr('id');
                                                $('form').submit();
                                            });

                                            var items = 1;
                                            var counter = 1;
                                            var card = 1;
                                            $('.med').on('change', function() {
                                                if ($(this).val() == "No")
                                                    $('.medi-set').addClass('hidden');
                                                else
                                                    $('.medi-set').removeClass('hidden');
                                            });
                                            /* Above data has to remove */
                                            $(document).ready(function() {

                                                $(document).on('click', '.careGivers', function() {
                                                    $('.ul1, .ul2, .ul3, .ul4, .ul5, .ul6').empty();
                                                    var x = 0;
                                                    $('[name="care_giver_name[]"]').each(function() {
                                                        $('.ul1').append('<li class="pr-5">\
                                                            <input type="checkbox" value="' + $(this).val() + '" name="Dementia_Name[]" id="st_care-giver_1_' + x + '" class="required-field" />\
                                                            <label for="st_care-giver_1_' + x + '">' + $(this).val() + '</label>\
                                                            </li>');
                                                        $('.ul2').append('<li class="pr-5">\
                                                            <input type="checkbox" value="' + $(this).val() + '" name="PM_Name[]" id="st_care-giver_2_' + x + '" class="required-field"/>\
                                                            <label for="st_care-giver_2_' + x + '">' + $(this).val() + '</label>\
                                                            </li>');
                                                        $('.ul3').append('<li class="pr-5">\
                                                            <input type="checkbox" value="' + $(this).val() + '" name="CATER_Carers_Name[]" id="st_care-giver_3_' + x + '" class="required-field"/>\
                                                            <label for="st_care-giver_3_' + x + '">' + $(this).val() + '</label>\
                                                            </li>');
                                                        $('.ul4').append('<li class="pr-5">\
                                                            <input type="checkbox" value="' + $(this).val() + '" name="Personal_Care_Name[]" id="st_care-giver_4_' + x + '" class="required-field"/>\
                                                            <label for="st_care-giver_4_' + x + '">' + $(this).val() + '</label>\
                                                            </li>');
                                                        $('.ul5').append('<li class="pr-5">\
                                                            <input type="checkbox" value="' + $(this).val() + '" name="Meal_Preprations_Name[]" id="st_care-giver_5_' + x + '" class="required-field"/>\
                                                            <label for="st_care-giver_5_' + x + '">' + $(this).val() + '</label>\
                                                            </li>');
                                                        $('.ul6').append('<li class="pr-5">\
                                                            <input type="checkbox" value="' + $(this).val() + '" name="Stoma_Care_Name[]" id="st_care-giver_6_' + x + '" class="required-field"/>\
                                                            <label for="st_care-giver_6_' + x + '">' + $(this).val() + '</label>\
                                                            </li>');
                                                    });

                                                });
                                                $(document).on('change', '.review', function() {
                                                    var val = 0;
                                                    var count = 0;
                                                    var total = $(this).closest('.collapse');
                                                    $(this).closest('.row').find('.review').each(function() {
                                                        if ($(this).val() !== "") {
                                                            val += parseInt($(this).val());
                                                            count += 1;
                                                        }
                                                    });
            /*
            alert(count);*/
            if (count !== 0)
                $(this).closest('.row').find('.average').val((val / count).toFixed(2));
            else
                $(this).closest('.row').find('.average').val('');

            totalaverage(total);
        });

                                                function totalaverage(total) {
                                                    var val = 0;
                                                    var arr = [2, 4, 4];
                                                    var count = 0;

                                                    total.find('.average').each(function() {
                                                        if ($(this).val() !== "") {
                                                            val += parseFloat($(this).val());
                                                            count += 1;
                                                        }
                                                    });
                                                    if (count !== 0)
                                                        total.find('.total_average').val((val / count).toFixed(2));
                                                    else {
                                                        total.find('.total_average').val('');
                                                    }
                                                    count = 0;
                                                    val = 0;
                                                    $('form').find('.total_average2').each(function() {
                                                        if ($(this).val() !== "") {
                                                            val += (parseFloat($(this).val()) / arr[count]);
                                                        }
                                                        count += 1;
                                                    });
                                                    $('.CSAT').val((val * 10).toFixed(0));
                                                }
                                                $(document).on('click', '.remove-item', function() {
                                                    var total = $(this).closest('.collapse');
                                                    $(this).closest('.row').remove();
                                                    var align = 2;
                                                    totalaverage(total);
                                                    $('#cart-items').find('.item-count').each(function() {
                                                        $(this).text(align);
                                                        align++;
                                                    });

                                                    if (counter == 4)
                                                        $('.add-more').fadeIn();

                                                    counter--;


                                                });

                                            });
$('.add-more').click(function() {
    if (counter < 4) {
        var content = $('#cart-item-1').html();
        $('#cart-items').append('<div class="row p30 outer-wrap" id="cart-item-' + (items + 1) + '">' + content + '</div>');
        $('#cart-item-' + (items + 1)).find('input').val("");
        $('#cart-item-' + (items + 1)).find('select').val("").change();
        $('#cart-item-' + (items + 1)).find('.item-count').text(items + 1);
        $('#cart-item-' + (items + 1)).find('.head-1').append('<button type="button" class="remove-item btn btn-sm btn-danger"><i class="fa fa-times"></i></button>');
        items++;
        counter++;
        if (counter == 4)
            $(this).fadeOut();
        var align = 2;
        $('#cart-items').find('.item-count').each(function() {
            $(this).text(align);
            align++;
        });
    }

});
$('.selected1').on('change', function() {
    if ($(this).val() == "No") {

        $(this).closest('.row').find('.hide-on-no').find('select').val('');
        $(this).closest('.row').find('.hide-on-no').addClass('hidden');
        $(this).closest('.row').find('.hide-on-no').find('input:checkbox').prop('checked', false);
    } else
    $(this).closest('.row').find('.hide-on-no').removeClass('hidden');
});

$('.selected2').on('change', function() {
    if ($(this).val() == "Yes") {

        $(this).closest('.row').find('.show-on-no').find('select').val(null);
        $(this).closest('.row').find('.show-on-no').find('select').addClass('required-field');

        $(this).closest('.row').find('.show-on-no').find('input').val(null);
        $(this).closest('.row').find('.show-on-no').find('input').addClass('required-field');

        $(this).closest('.row').find('.show-on-no').find('checkbox').val('');
        $(this).closest('.row').find('.show-on-no').addClass('hidden');
    } else
    $(this).closest('.row').find('.show-on-no').removeClass('hidden');
    $(this).closest('.row').find('.show-on-no').find('select').removeClass('required-field');
    $(this).closest('.row').find('.show-on-no').find('input').removeClass('required-field');

});
$('.add_other_yes').on('change', function() {
    if ($(this).val() == "No") {

        $(this).closest('.row').find('.show-on-yes').addClass('hidden');
    } else
    $(this).closest('.row').find('.show-on-yes').removeClass('hidden');
});

$(".date").datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'dd/mm/yyyy'
});

$('.back').click(function() {
    let id = $(this).attr("data-id");

    $("#card-" + id).removeClass("show");
    $("#card-" + id).closest('.card').find('.btn.btn-link').addClass("collapsed");
    card = card - 1;
    let exac_num = parseInt(id) - parseInt(1);
    $("#card-" + exac_num).addClass("show");
    $("#card-" + exac_num).closest('.card').find('.btn.btn-link.collapsed').removeClass("collapsed");
    $('html, body').animate({
        scrollTop: $("#card-" + exac_num).closest('.card').offset().top
    }, 300);
});
$('input,select').on("change", function() {
    $(this).closest('div').find('.alert-danger').remove();
        //validate();
    })
$('.validate').click(function() {
    let flag = false;
    var valid = true;
    $('.required-field').removeClass('alert-danger')
    $(".required-field:visible").each(function() {
        if ($(this).val() == "") {
            $(this).closest('div').find(".alert-danger").remove();
            $(this).closest('div').append('<div class="alert-danger mt-24">This field is required</div>');
            valid = false;
        } else {
            $(this).closest('div').find(".alert-danger").remove();

        }

    });
    if (!valid) {
        $('html, body').animate({
            scrollTop: $('.alert-danger:first').closest('div').parent('div').offset().top
        }, 100);
    } else if (!flag) {
        let id = $(this).attr("data-id");
        console.log(id);
        let card_attr = $("#card-" + id).closest('.collapse.bg-white.show').attr("id");

        let card_num = card_attr.split("-");
        $("#card-" + id).closest('.card').find('.btn.btn-link').attr("data-target", "#card-" + id);
        $("#card-" + id).removeClass("show");
        $("#card-" + id).closest('.card').find('.btn.btn-link').addClass("collapsed");

        $("#card-" + id).closest('.card').removeClass("incomplete");

        card = card + 1;
        let exac_num = parseInt(card_num[1]) + parseInt(1);
        console.log(exac_num);
        $("#card-" + exac_num).addClass("show");
        $("#card-" + exac_num).removeClass("collapsed");
        $("#card-" + exac_num).closest('.card').find('.btn.btn-link.collapsed').removeClass("collapsed");
        $('html, body').animate({
            scrollTop: $("#card-" + id).closest('.card').offset().top
        }, 300);
    }
    return valid;
});

$('[name="care_manager_id"]').on('change', function() {
    let url = '{{ route("find.caremanager") }}/' + $(this).val();
    $.get(url, function(data) {
        $('[name="care_manager"]').val(data[0]);
    });

});
</script>
<script>
    let validate='';
    function formValidation()
    {

        let flag = false;
        validate=true;
        $('.required-field').removeClass('alert-danger');
        $(".required-field").each(function() {
            if ($(this).val() == "" ) {
                $(this).closest('div').find(".alert-danger").remove();
                $(this).closest('div').append('<div class="alert-danger mt-24">This field is required</div>');
                validate = false;
            } else {
                $(this).closest('div').find(".alert-danger").remove();

            }

        });
        console.log(validate);
        if (validate==false) {
            $('.alert-danger:first').closest('.bg-white').addClass('show');
            $('html, body').animate({
                scrollTop: $('.alert-danger:first').closest('div').parent('div').offset().top
            }, 100);
        }

    }

    $('form').submit(function(e) {
        e.preventDefault();

        formValidation();

        console.log(validate);
        if (validate==true) {
            if(button_clicked_id == 'submit')
            {
                form_status = '2';
            }else
            {
                form_status = '1';
            }
            var form = $(this);
            ImagePNG2();
            ImagePNG();
            var Care_Giver = attitude = ability = reliability = Average_giver = CG_comment = Dementia_Name = PM_Name = CATER_Carers_Name = Personal_Care_Name = Meal_Preprations_Name = Stoma_Care_Name = "";
            $('[name="Care_Giver[]"]').each(function() {
                Care_Giver += $(this).val() + "\n";
            });
            $('[name="attitude[]"]').each(function() {
                attitude += $(this).val() + "\n";
            });
            $('[name="ability[]"]').each(function() {
                ability += $(this).val() + "\n";
            });
            $('[name="reliability[]"]').each(function() {
                reliability += $(this).val() + "\n";
            });
            $('[name="Average_giver[]"]').each(function() {
                Average_giver += $(this).val() + "\n";
            });
            $('[name="CG_comment[]"]').each(function() {
                CG_comment += $(this).val() + "\n";
            });
            Dementia_Name = $('[name="Dementia_Name[]"]:checked').map(function() {
                return $(this).val();
            }).get();
            PM_Name = $('[name="PM_Name[]"]:checked').map(function() {
                return $(this).val();
            }).get();
            CATER_Carers_Name = $('[name="CATER_Carers_Name[]"]:checked').map(function() {
                return $(this).val();
            }).get();
            Personal_Care_Name = $('[name="Personal_Care_Name[]"]:checked').map(function() {
                return $(this).val();
            }).get();
            Meal_Preprations_Name = $('[name="Meal_Preprations_Name[]"]:checked').map(function() {
                return $(this).val();
            }).get();
            Stoma_Care_Name = $('[name="Stoma_Care_Name[]"]:checked').map(function() {
                return $(this).val();
            }).get();

            if(button_clicked_id == 'submit')
            {
                $('#submit').attr('disabled', 'disabled');
                $('#submit').text('Please wait..');
            }else
            {
                $('#save_draft').attr('disabled', 'disabled');
                $('#save_draft').text('Please wait..');
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(form).serialize() +
                '&Care_Giver=' + Care_Giver.slice("\n", -1) +
                '&Dementia_Name=' + Dementia_Name +
                '&PM_Name=' + PM_Name +
                '&CATER_Carers_Name=' + CATER_Carers_Name +
                '&Personal_Care_Name=' + Personal_Care_Name +
                '&Meal_Preprations_Name=' + Meal_Preprations_Name +
                '&Stoma_Care_Name=' + Stoma_Care_Name +
                '&form_status=' + form_status, 
                success: function(response) {
                    onSuccessSubmit(response.id, response.form_status);
                },
                error: function(response) {
                    $('#submit').removeAttr('disabled');
                    $('#save_draft').removeAttr('disabled');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error While Submitting Form!',

                    })
                }
            });
        }

    });

    function toastr(msg, type) {
        $('#toastr').text(msg);
        $('#toastr').removeClass('success');
        $('#toastr').removeClass('error');
        $('#toastr').addClass(type).fadeIn();

        setTimeout(function() {
            // $('#toastr').fadeOut();
        }, 4000);
    }
    
    function onSuccessSubmit(id,status) {
        if(status == '1')
        {
            $('#submit').removeAttr('disabled');
            $('#save_draft').removeAttr('disabled');
            toastr('Form Saved As Drfat, Edit and Submit Now!', 'success');
        }
        if(status == '2')
        {
            $('#save_draft').hide();
            $('#submit').hide();  
            toastr('Form Submitted, Thank You!', 'success');
        }
        $("html, body").animate({
            scrollTop: $(".header").offset().top,
        },
        100
        );
        
        setTimeout(function() {
            if(button_clicked_id == 'save_draft')
            {
                window.location.href=$(location).attr("href")+"&status="+id;
            }
        }, 2000);
    }
</script>

<script>
    $(document).ready(function() {

        $('#county').on('change', function() {

            let id = $(this).val();
            let url = '{{ route("find.locality") }}/' + id;
            let url_province = '{{ route("find.province") }}/' + id;
            $.get(url, function(data) {
                $('#locality').html(data);
            });
            $.get(url_province, function(response) {
                $('#province').html(response);
            });

        });
        $(document).on('focusout', "input[name='care_giver_id[]']", function() {
            console.log('stop');
            $(this).closest('.outer-wrap').find(".search-care-giver").click();
        });
        $(document).on("click", ".search-care-giver", function() {
            console.log('stop');
            let closest = $(this);
            let care_id = closest.closest('.outer-wrap').find("input[name='care_giver_id[]']").val();
            if (care_id != undefined) {
                let url = '{{ route("find.caregiver") }}/' + care_id;
                $.get(url, function(data) {
                    console.log(data[0]);
                    if (data[0]=='error_display')
                    {
                        closest.closest('.outer-wrap').find("input[name='care_giver_name[]']:first").val('');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Record Not Found!',
                        })
                    }
                    else{
                        closest.closest('.outer-wrap').find("input[name='care_giver_name[]']:first").val(data[0]);
                    }

                });
            } else {

            }
        });
    });
    // Mapping old values
    
    @if(isset(request()->status))
    function mapClientRecordForEdit(data)
    {
        $.map(data, function(value, index){
            var input = $('[name="'+index+'"]');
            if($(input).length && $(input).attr('type') !== 'file')
            {
              if(($(input).attr('type') == 'radio' || $(input).attr('type') == 'checkbox') && value == $(input).val())
                $(input).prop('checked', true);
            else
              $(input).val(value).change();
      }
  });
    }
    var clientRecord = <?php echo json_encode($clientRecord->toArray()) ?>;
    mapClientRecordForEdit(clientRecord);

    $(document).on("click" ,".btn.btn-link", function(){
        $(this).toggleClass("collapsed");
        $(this).closest('.shadow-box').find(".collapse").toggleClass("show");
        expand = $(this).attr("aria-expanded");
        if(expand == 'true')
        {
            $(this).attr("aria-expanded", 'false');
        }else
        {
            $(this).attr("aria-expanded", 'true');
        }

    });
    @endif
    
</script>
</body>

</html>
