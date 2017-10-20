<section class="dashboard-counts no-padding-bottom no-padding-top">
  <div class="container-fluid no-padding">
    <div class="row bg-white has-shadow">
      <!-- Item -->
      <div class="col-md-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-violet"><i class="fa fa-user-circle-o"></i></div>
          <div class="title"><span>SOS<br>Members</span>
            <div class="progress">
              <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
            </div>
          </div>
          <div class="number"><strong>25</strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-md-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-red"><i class="fa fa-tty"></i></div>
          <div class="title"><span>SMS<br>Activities</span>
            <div class="progress">
              <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
            </div>
          </div>
          <div class="number"><strong>70</strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-md-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-green"><i class="fa fa-pencil-square"></i></div>
          <div class="title"><span>Blog<br>Posts</span>
            <div class="progress">
              <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
            </div>
          </div>
          <div class="number"><strong>44</strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-md-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-orange"><i class="fa fa-archive"></i></div>
          <div class="title"><span>Files<br>Documents</span>
            <div class="progress">
              <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
            </div>
          </div>
          <div class="number"><strong>35</strong></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Dashboard Header Section    -->
<section class="dashboard-header">
  <div class="container-fluid">
    <div class="row">
      <!-- Statistics -->
      <div class="statistics col-lg-3 col-12 ">
        <div class="statistic d-flex align-items-center bg-white has-shadow">
          <div class="icon bg-red"><i class="fa fa-plus-circle"></i></div>
          <div class="text"><strong>234</strong><br><small>Applications</small></div>
        </div>
        <div class="statistic d-flex align-items-center bg-white has-shadow">
          <div class="icon bg-green"><i class="fa fa-check-circle"></i></div>
          <div class="text"><strong>152</strong><br><small>Approved</small></div>
        </div>
        <div class="statistic d-flex align-items-center bg-white has-shadow">
          <div class="icon bg-orange"><i class="fa fa-cloud-download"></i></div>
          <div class="text"><strong>147</strong><br><small>Downloads</small></div>
        </div>
      </div>
      <!-- Line Chart            -->
      <div class="chart col-lg-6 col-12">
        <div class="bar-chart-example card no-margin-bottom">
          <div class="card-close">
          </div>
          <div class="card-header align-items-center text-center">
            <h3 class="h4">Page View Statistics</h3>
          </div>
          <div class="card-body">
            <canvas id="barChartExample"></canvas>
          </div>
        </div>
      </div>
      <div class="chart col-lg-3 col-12">
        <!-- Bar Chart   -->
        <div class="bar-chart has-shadow bg-white">
          <div class="title"><strong class="text-violet">95%</strong><br><small>Current Server Uptime</small></div>
          {{-- <div class="title"><strong class="text-violet">95%</strong><br><small>Mobile App Request</small></div> --}}
          <canvas id="barChartHome"></canvas>
        </div>
        <!-- Numbers-->
        <div id="app" class="statistic d-flex align-items-center bg-white has-shadow">
          <div class="icon bg-redder statIcon"><i class="fa fa-line-chart"></i></div>
          <div class="text"><strong>SOS App</strong><br><small class="text-redder stat">Not Connected</small></div>
        </div>
      </div>
    </div>
  </div>
</section>
