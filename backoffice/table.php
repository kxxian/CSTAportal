<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Custom styles for dataTable -->
    <link href="vendor/datatables/dataTables1.bootstrap4.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>
<body>
<table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name
      </th>
      <th class="th-sm">Position
      </th>
      <th class="th-sm">Office
      </th>
      <th class="th-sm">Age
      </th>
      <th class="th-sm">Start date
      </th>
      <th class="th-sm">Salary
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Tiger Nixon</td>
      <td>System Architect</td>
      <td>Edinburgh</td>
      <td>61</td>
      <td>2011/04/25</td>
      <td>$320,800</td>
    </tr>
    <tr>
      <td>Garrett Winters</td>
      <td>Accountant</td>
      <td>Tokyo</td>
      <td>63</td>
      <td>2011/07/25</td>
      <td>$170,750</td>
    </tr>
    <tr>
      <td>Ashton Cox</td>
      <td>Junior Technical Author</td>
      <td>San Francisco</td>
      <td>66</td>
      <td>2009/01/12</td>
      <td>$86,000</td>
    </tr>
    <tr>
      <td>Cedric Kelly</td>
      <td>Senior Javascript Developer</td>
      <td>Edinburgh</td>
      <td>22</td>
      <td>2012/03/29</td>
      <td>$433,060</td>
    </tr>
    <tr>
      <td>Airi Satou</td>
      <td>Accountant</td>
      <td>Tokyo</td>
      <td>33</td>
      <td>2008/11/28</td>
      <td>$162,700</td>
    </tr>
    <tr>
      <td>Brielle Williamson</td>
      <td>Integration Specialist</td>
      <td>New York</td>
      <td>61</td>
      <td>2012/12/02</td>
      <td>$372,000</td>
    </tr>
    <tr>
      <td>Herrod Chandler</td>
      <td>Sales Assistant</td>
      <td>San Francisco</td>
      <td>59</td>
      <td>2012/08/06</td>
      <td>$137,500</td>
    </tr>
    <tr>
      <td>Rhona Davidson</td>
      <td>Integration Specialist</td>
      <td>Tokyo</td>
      <td>55</td>
      <td>2010/10/14</td>
      <td>$327,900</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th>Name
      </th>
      <th>Position
      </th>
      <th>Office
      </th>
      <th>Age
      </th>
      <th>Start date
      </th>
      <th>Salary
      </th>
    </tr>
  </tfoot>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dtDynamicVerticalScrollExample').DataTable({
            "scrollY": "50vh",
            "scrollCollapse": true,
        });
         $('.dataTables_length').addClass('bs-select');
});
</script>
</body>
</html>