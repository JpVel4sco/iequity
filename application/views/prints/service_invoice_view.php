<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Service Invoice</title>
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
        .table-bordered {
            border: 1px solid #000;
        }
    </style>
  </head>
  <body>
    <div style="margin-bottom: 1px;">
        <table class="table table-borderless text-center">
            <caption><h5 class="fs-5 fw-bold"><?php echo $company_info->comp_name; ?></h5></caption>
            <tbody class="fs-6">
                <tr>
                    <td><?php echo $company_info->comp_address; ?></td>
                </tr>
                <tr>
                    <td>Telephone: <?php echo $company_info->comp_tel_no; ?></td>
                </tr>
                <tr>
                    <td>Telefax: <?php echo $company_info->comp_telefax; ?></td>
                </tr>
                <tr>
                    <td><?php echo $company_info->comp_web_address; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin-bottom: 5px;">
        <div style="margin-bottom: 5px;">
            <table>
                <tr>
                    <td width="61%"><h5 class="fs-5 fw-bold">SERVICE INVOICE</h5></td>
                    <td width="39%"><span class="fw-bold">No. </span><?php if (!empty($service_invoice_info)) {$number = $service_invoice_info->se_id; $formatted_number = sprintf("%07d", $number);echo $formatted_number;}?>
                    </td>
                </tr>
            </table>
        </div>
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td width="13%">CUSTOMER</td>
                    <td width="3%">:</td>
                    <td width="45%"><?php if (!empty($service_invoice_info)) { echo $ticket_info->comp_name; } ; ?></td>
                    <td width="18%">DATE RECEIVED</td>
                    <td width="3%">:</td>
                    <td width="18%"><?php if (!empty($service_invoice_info)) { echo $ticket_info->ticket_registration_date; } ; ?></td>
                </tr>
                <tr>
                    <td width="13%">ADDRESS</td>
                    <td width="3%">:</td>
                    <td width="45%"><?php if (!empty($service_invoice_info)) { echo $ticket_info->comp_address; } ; ?></td>
                    <td width="18%">DATE RELEASED</td>
                    <td width="3%">:</td>
                    <td width="18%"><?php if (!empty($service_invoice_info)) { echo $ticket_info->date_of_release; } ; ?></td>
                </tr>
                <tr>
                    <td width="13%">TELEPHONE</td>
                    <td width="3%">:</td>
                    <td width="45%"><?php if (!empty($service_invoice_info)) { echo $ticket_info->mobile; } ; ?></td>
                    <td width="18%">TECHNICIAN</td>
                    <td width="3%">:</td>
                    <td width="18%"><?php if (!empty($service_invoice_info)) { echo $ticket_info->t_technical_assigned; } ; ?></td>
                </tr>
                <tr>
                    <td width="13%">CONTACT</td>
                    <td width="3%">:</td>
                    <td width="45%"><?php if (!empty($service_invoice_info)) { echo $ticket_info->fname." ".$ticket_info->lname; } ; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin-bottom: 5px;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="fw-bold text-center" width="27%">DESCRIPTION</td>
                    <td class="fw-bold text-center" width="17%">SERIAL</td>
                    <td class="fw-bold text-center" width="6%">QTY</td>
                    <td class="fw-bold text-center" width="6%">UNIT</td>
                    <td class="fw-bold text-center" width="29%">COMPLAIN</td>
                    <td class="fw-bold text-center" width="15%">WARRANTY</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="27%"><?php if (!empty($service_invoice_info)) { echo $ticket_info->t_model; } ; ?></td>
                    <td width="17%"><?php if (!empty($service_invoice_info)) { $serial_nos = explode(', ', $service_invoice_info->serial_no); foreach ($serial_nos as $serial) { ?><?php echo "-".trim($serial); ?> <?php } } ?></td>
                    <td width="6%" class="text-center"><?php if (!empty($service_invoice_info)) { echo $ticket_info->t_qty; } ; ?></td>
                    <td width="6%" class="text-center"><?php if (!empty($service_invoice_info)) { echo $ticket_info->t_unit; } ; ?></td>
                    <td width="29%"><?php if (!empty($service_invoice_info)) { echo $ticket_info->t_problem; } ; ?></td>
                    <td width="15%" class="text-center"><?php if (!empty($service_invoice_info)) { echo $ticket_info->warranty; } ; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin-bottom: 5px">
        <div class="fw-bold">REMARKS</div>
        <table class="table table-bordered">
            <tbody>
                <?php if (!empty($service_invoice_info)) {
                    $remarks = explode(',', $service_invoice_info->remarks);
                    foreach ($remarks as $remark) {
                        ?>
                        <tr>
                            <td><?php echo trim($remark); ?></td>
                        </tr>
                        <?php
                    }
                } ?>
            </tbody>
        </table>
    </div>

    <div style="margin-bottom: 5px;">
        <div class="fw-bold">PARTS / MATERIAL CHARGES</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="fw-bold text-center" width="45%">DESCRIPTION</td>
                    <td class="fw-bold text-center" width="6%">QTY</td>
                    <td class="fw-bold text-center" width="6%">UNIT</td>
                    <td class="fw-bold text-center" width="21.5%">PRICE</td>
                    <td class="fw-bold text-center" width="21.5%">AMOUNT</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parts_or_material_charges as $charge_item): ?>
                    <tr>
                        <td width="45%"><?php echo $charge_item->description; ?></td>
                        <td width="6%" class="text-center"><?php echo $charge_item->qty; ?></td>
                        <td width="6%" class="text-center"><?php echo $charge_item->unit; ?></td>
                        <td width="21.5%" class="text-center"><?php echo $charge_item->price; ?></td>
                        <td width="21.5%" class="text-center"><?php echo $charge_item->amount; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td width="45%"></td>
                    <td width="6%"></td>
                    <td width="6%"></td>
                    <td width="21.5%"></td>
                    <td width="21.5%" class="text-center">Php <span class="text-underline"><?php if (!empty($service_invoice_info)) {echo $service_invoice_info->pmc_charges_php;} ;?></span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin-bottom: 10px;">
        <div class="fw-bold">LABOR / OTHER CHARGES</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="fw-bold text-center">CHARGES</td>
                    <td class="fw-bold text-center">AMOUNT</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($labor_or_other_charges as $charge_item): ?>
                    <tr>
                        <td><?php echo $charge_item->charges; ?></td>
                        <td class="text-center"><?php echo $charge_item->amount; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <table class="table-borderless">
            <tr>
                <td></td>
                <td class="text-center">Php <span class="text-underline"><?php if (!empty($service_invoice_info)) {echo $service_invoice_info->lo_charges_php;} ;?></span></td>
            </tr>
        </table>
    </div>

    TOTAL PARTS AND LABOR COST: <span class="fw-bold">Php <span class="text-underline"><?php if (!empty($service_invoice_info)) {echo $service_invoice_info->labor_and_parts_cost;} ;?></span></span><br><br><br><br>
    
    <table class="table table-borderless" style="position: absolute; bottom: 0; width: 100%;">
        <tbody>
            <tr>
                <td class="text-center">Approved by:</td>
                <td class="text-center">Checked by:</td>
                <td class="text-center">Received / Released by:</td>
                <td class="text-center"></td>
            </tr>
            <br><br><br>
            <tr>
                <td class="text-underline text-center"><?php if (!empty($service_invoice_info)) {echo $service_invoice_info->approved_by;} ;?></td>
                <td class="text-underline text-center"><?php if (!empty($service_invoice_info)) {echo $service_invoice_info->checked_by;} ;?></td>
                <td class="text-underline text-center"><?php if (!empty($service_invoice_info)) {echo $service_invoice_info->released_by;} ;?></td>
                <td class="text-underline text-center"><?php if (!empty($service_invoice_info)) {echo $service_invoice_info->date;} ;?></td>
            </tr>
            <tr>
                <td class="text-center">Name and signature</td>
                <td class="text-center">Name and signature</td>
                <td class="text-center">Name and signature</td>
                <td class="text-center">Date</td>
            </tr>
        </tbody>
    </table>
  </body>
</html>