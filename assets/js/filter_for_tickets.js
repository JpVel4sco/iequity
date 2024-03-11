// Add a JavaScript code to initialize the DataTables plugin and filter data 
$(document).ready(function() {
  // Initialize the DataTables plugin
  var table = $('#data-table-tickets').DataTable({
    responsive: true,
    "order": [[ 0, "desc" ]]
  });

  // Add event listener for the status filter
  $('#status-filter').change(function() {
    var table = $('#data-table-tickets').DataTable();
    var status = $(this).val();
    if (status == 'See all') {
      status = '';
    }
    table.column(11).search(status).draw();
});


  // Add event listener for the start date filter
// Define a search function that filters the data based on the date range
function dateRangeFilter(settings, data, dataIndex) {
  var startDate = $('#start-date-filter').val();
  var endDate = $('#end-date-filter').val();
  var date = moment(data[1], 'YYYY-MM-DD');
  var startDateObj = moment(startDate, 'YYYY-MM-DD');
  var endDateObj = moment(endDate, 'YYYY-MM-DD');
  if (startDateObj <= date && date <= endDateObj) {
    return true;
  }
  return false;
}

// Add event listeners for the start date and end date filters
$('#start-date-filter, #end-date-filter').on('change', function () {
  // Apply the date range filter to the table and redraw it
  $.fn.dataTable.ext.search.pop();
  $.fn.dataTable.ext.search.push(dateRangeFilter);
  table.draw();
});
});


// Function to export table data to Excel
function ticketTableToExcel(table_id) {
  var status = $('#status-filter').val();
  if (status === 'See all') {
    status = 'All';
  }
  var d = new Date();
  var year = d.getFullYear();
  var month = d.getMonth() + 1;
  var day = d.getDate();
  var formattedDate = year + "-" + month + "-" + day;
  var filename = status + " tickets - " + formattedDate + ".xls";

  var tab_text = "<table border='2px'><tr bgcolor='blue' style='color: white;'>"; // Set the text color to white for row 1
  var textRange;
  var j = 0;
  var tab = document.getElementById(table_id); // id of table

  // Exclude the "Actions" header from the exported file
  for (j = 0; j < tab.rows[0].cells.length - 1; j++) {
    tab_text = tab_text + "<th>" + tab.rows[0].cells[j].innerHTML + "</th>";
  }
  tab_text = tab_text + "</tr>";

  // Exclude the select field from each row in the exported file
  for (j = 1; j < tab.rows.length; j++) {
    tab_text = tab_text + "<tr>";
    for (var k = 0; k < tab.rows[j].cells.length - 1; k++) {
      tab_text = tab_text + "<td>" + tab.rows[j].cells[k].innerHTML + "</td>";
    }
    tab_text = tab_text + "</tr>";
  }

  tab_text = tab_text + "</table>";
  tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
  tab_text = tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
  tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // removes input params

  var ua = window.navigator.userAgent;
  var msie = ua.indexOf("MSIE ");
  var sa;

  // If Internet Explorer
  if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
    // If Internet Explorer
    txtArea1.document.open("txt/html","replace");
    txtArea1.document.write(tab_text);
    txtArea1.document.close();
    txtArea1.focus();
    sa = txtArea1.document.execCommand("SaveAs", true, filename);
  }
  else { // other browsers
    var link = document.createElement("a");
    link.href = 'data:application/vnd.ms-excel,' + encodeURIComponent(tab_text);
    link.download = filename;
    link.click();
    sa = true;
  }

  return (sa);
}

// Add the export Excel functionality to the Print button
document.getElementById("print-btn").addEventListener("click", function() {
  // Get the table ID
  var table_id = "data-table-tickets";

  // Export the table as an Excel file
  ticketTableToExcel(table_id);
});