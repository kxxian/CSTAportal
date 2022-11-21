<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Step Wizard Bar CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

    <style>
        .steps .step {
            display: block;
            width: 100%;
            margin-bottom: 35px;
            text-align: center
        }

        .steps .step .step-icon-wrap {
            display: block;
            position: relative;
            width: 100%;
            height: 80px;
            text-align: center
        }

        .steps .step .step-icon-wrap::before,
        .steps .step .step-icon-wrap::after {
            display: block;
            position: absolute;
            top: 50%;
            width: 50%;
            height: 3px;
            margin-top: -1px;
            background-color: #e1e7ec;
            content: '';
            z-index: 1
        }

        .steps .step .step-icon-wrap::before {
            left: 0
        }

        .steps .step .step-icon-wrap::after {
            right: 0
        }

        .steps .step .step-icon {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
            border: 1px solid #e1e7ec;
            border-radius: 50%;
            background-color: #f5f5f5;
            color: #374250;
            font-size: 38px;
            line-height: 81px;
            z-index: 5
        }

        .steps .step .step-title {
            margin-top: 16px;
            margin-bottom: 0;
            color: #606975;
            font-size: 14px;
            font-weight: 500
        }

        .steps .step:first-child .step-icon-wrap::before {
            display: none
        }

        .steps .step:last-child .step-icon-wrap::after {
            display: none
        }

        .steps .step.completed .step-icon-wrap::before,
        .steps .step.completed .step-icon-wrap::after {
            background-color: #28a745;
        }

        .steps .step.completed .step-icon {
            border-color: #28a745;
            background-color: #28a745;
            color: #fff
        }

        @media (max-width: 576px) {

            .flex-sm-nowrap .step .step-icon-wrap::before,
            .flex-sm-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 768px) {

            .flex-md-nowrap .step .step-icon-wrap::before,
            .flex-md-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 991px) {

            .flex-lg-nowrap .step .step-icon-wrap::before,
            .flex-lg-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 1200px) {

            .flex-xl-nowrap .step .step-icon-wrap::before,
            .flex-xl-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        .bg-faded,
        .bg-secondary {
            background-color: #f5f5f5 !important;
        }
    </style>


</head>

<body>
    <div class="row">
        <div class="col-sm-12 float-right mb-2">
            <span class="float-right">
                <button class="btn btn-info btn-sm" title="Help" data-toggle="modal" data-target="#instruct">
                    <i class="fa fa-question fa-fw"></i>
                </button>
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="container ">
                <div class="card mb-3">
                    <div class="p-2 text-center text-white text-lg  rounded-top" style="background-color:#2E1503"><span class="text-uppercase"> Enrollment Progress </span></div>

                    <div class="card-body">
                        <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                            <div class="step" id="application">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="pe-7s-note"></i></div>
                                </div>
                                <h4 class="step-title">Application</h4>
                            </div>
                            <div class="step" id="reqval">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="pe-7s-folder"></i></div>
                                </div>
                                <h4 class="step-title">Requirements Checking</h4>
                            </div>
                            <div class="step" id="assessment">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="pe-7s-note2"></i></div>
                                </div>
                                <h4 class="step-title">Assessment</h4>
                            </div>
                            <div class="step" id="payment">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="pe-7s-wallet"></i></div>
                                </div>
                                <h4 class="step-title">Payment</h4>
                            </div>
                            <div class="step" id="validate">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="pe-7s-id"></i></div>
                                </div>
                                <h4 class="step-title">Validation</h4>
                            </div>
                            <div class="step" id="enrolled">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="pe-7s-culture"></i></div>
                                </div>
                                <h4 class="step-title">Enrolled</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center">

                </div>
            </div>
        </div>
    </div>

</body>

</html>