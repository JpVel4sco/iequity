<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MR Print</title>
    <style>
        body {
            font-family: helvetica;
            font-size: 10pt;
        }
        .table {
            border-collapse: collapse;
            width: 100%;
        }
        .table td, .table th {
            border: 1px solid black;
            padding: 6px;
        }
        .table-borderless td, .table-borderless th {
            border: none;
        }
        .fs-5 {
            font-size: 14pt;
        }
        .fw-bold {
            font-weight: bold;
        }
        .text-center {
            text-align: center;
        }
        .text-underline {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div style="margin-bottom: 20px;">
        <table class="table table-borderless" style="margin-bottom: 20px;">
            <caption><h5 class="fs-5 fw-bold text-center"><?php echo $company_info->comp_name; ?></h5></caption>
            <tbody class="fs-6">
                <tr class="text-center">
                    <td><?php echo $company_info->comp_address; ?></td>
                </tr>
                <tr class="text-center">
                    <td>Telephone: <?php echo $company_info->comp_tel_no; ?></td>
                </tr>
                <tr class="text-center">
                    <td>Telefax: <?php echo $company_info->comp_telefax; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin-bottom: 20px;">
        <table class="table table-borderless mt-3">
            <tbody>
                <tr>
                    <td class="fw-bold" width="11%">COMPANY</td>
                    <td class="fw-bold text-center" width="4%">:</td>
                    <td width="45%"><?php if (!empty($mr_info)) {echo $ticket_info->comp_name;} ;?></td>
                    <td class="fw-bold" width="16%">MR NO.</td>
                    <td class="fw-bold text-center" width="4%">:</td>
                    <td width="20%"><?php if (!empty($mr_info)) {$number = $mr_info->mr_no; $formatted_number = sprintf("%07d", $number);echo $formatted_number;}?>
                    </td>
                </tr>
                <tr>
                    <td class="fw-bold" width="11%">NAME</td>
                    <td class="fw-bold text-center" width="4%">:</td>
                    <td width="45%"><?php if (!empty($mr_info)) {echo $ticket_info->fname." ".$ticket_info->lname; } ;?></td>
                    <td class="fw-bold" width="16%">DATE CREATED</td>
                    <td class="fw-bold text-center" width="4%">:</td>
                    <td width="20%"><?php if (!empty($mr_info)) {echo $ticket_info->ticket_registration_date; } ; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold" width="11%">ADDRESS</td>
                    <td class="fw-bold text-center" width="4%">:</td>
                    <td width="45%"><?php if(!empty($mr_info)){echo $ticket_info->comp_address; } ; ?></td>
                    <td class="fw-bold" width="16%">CONTACT NO.</td>
                    <td class="fw-bold text-center" width="4%">:</td>
                    <td width="20%"><?php if(!empty($mr_info)){echo $ticket_info->mobile; } ; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold" width="11%">STATUS</td>
                    <td class="fw-bold text-center" width="4%">:</td>
                    <td width="45%"><?php if(!empty($mr_info)){echo "FOR ".$mr_info->status;};?></td>
                    <td class="fw-bold" width="20%" style="text-align: right;"></td>
                    <td width="20%"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin-bottom: 20px;">
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <td class="fw-bold text-center" width="10%">QTY</td>
                    <td class="fw-bold text-center" width="10%">UNIT</td>
                    <td class="fw-bold text-center" width="60%">DESCRIPTION</td>
                    <td class="fw-bold text-center" width="20%">REMARKS</td>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td class="text-center" width="10%"><?php if(!empty($mr_info)){echo $ticket_info->t_qty; } ;?></td>
                    <td class="text-center" width="10%"><?php if(!empty($mr_info)){echo $ticket_info->t_unit;} ;?></td>
                    <td class="" width="60%"><?php if(!empty($mr_info)) {echo "<span class='fw-bold'>Model: ".$ticket_info->t_model."</span><br><span class='fw-bold'>SN: ".$mr_info->serial_no."</span><br><br><span class='fw-bold'>Accessories: ".$mr_info->accessories."</span>";} ;?></td>
                    <td class="text-center" width="20%"><?php if(!empty($mr_info)){echo $mr_info->remarks;};?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <table class="table table-borderless">
        <tbody>
            <tr>
                <td class="text-center">Prepared by:</td>
                <td class="text-center">Received by:</td>
                <td class="text-center">Date</td>
            </tr>
        </tbody>
    </table>
    <br><br><br>

    <table class="table table-borderless">
        <tbody>
            <tr>
                <td class="text-center"><?php if (!empty($mr_info)) {echo $mr_info->prepared_by;} ;?></td>
                <td class="text-underline text-center"><?php if (!empty($mr_info)) {echo $mr_info->received_by;} ;?></td>
                <td class="text-underline text-center"><?php if (!empty($mr_info)) {echo $mr_info->date;} ;?></td>
            </tr>
        </tbody>
    </table>
    <table class="table table-borderless">
        <tbody>
            <tr>
                <td class="text-center"></td>
                <td class="text-center">Name and Signature</td>
                <td class="text-center"></td>
            </tr>
        </tbody>
    </table>
</body>
</html>