// Initialize the DataTables plugin "FOR USER LIST ONLY"
$(document).ready(function() {
    // Initialize the DataTables plugin
    var table = $('#data-table-users').DataTable({
      responsive: true,
    });
  
  // Add event listener for the role filter
  $('#role-filter').on('change', function () {
  var role = $(this).val();
  if (role == 'See All') {
    role = ''; // Set role to an empty string to show all rows
  }
  table.column(10).search(role ? '^' + role + '$' : '', true, false).draw();
  });
  
    // Add event listener for the date range filter
    function dateRangeFilter(settings, data, dataIndex) {
      var startDate = $('#start_date').val();
      var endDate = $('#end_date').val();
      var regDate = moment(data[1], 'YYYY-MM-DD');
      var startDateObj = moment(startDate, 'YYYY-MM-DD');
      var endDateObj = moment(endDate, 'YYYY-MM-DD');
      if (startDateObj <= regDate && regDate <= endDateObj) {
        return true;
      }
      return false;
    }
  
    $('#start_date, #end_date').on('change', function () {
      // Apply the date range filter to the table and redraw it
      $.fn.dataTable.ext.search.pop();
      $.fn.dataTable.ext.search.push(dateRangeFilter);
      table.draw();
    });
  });
  
  function tableToExcel(table_id) {
    var role = $('#role-filter').val();
    if (role === 'See All') {
      role = 'All';
    }
    var d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth() + 1;
    var day = d.getDate();
    var formattedDate = year + "-" + month + "-" + day;
    var filename = role + " users - " + formattedDate + ".xls";
  
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
  document.getElementById("user-print-btn").addEventListener("click", function() {
    // Get the table ID
    var table_id = "data-table-users";
  
    // Export the table as an Excel file
    tableToExcel(table_id);
  });