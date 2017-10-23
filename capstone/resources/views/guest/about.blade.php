@extends ('layouts.landing.master')

@section ('content')

<div class="bg bg-about"></div>
  <div class="wrapper">
    <div class="p-4 my-4" id="about">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

          <h2>"Education is a fundamental Human Rights and essential for the exercise of all other human rights."</h2>
          <hr>
          <div class="text-justify">
              <p class="con-p">Under the Aquino administration children’s rights violations are rife, with military occupation of schools becoming out of control and interrupting the education of future generations. This must not be tolerated!</p>
              <p class="con-p">International laws covering conflict situations expressly prohibit the use of public infrastructures such as schools; hospitals and rural health units for military purposes such as command posts, barracks detachments, and supply depots.</p>
              <p class="con-p">Education is a basic human right, however over recent years there has been an alarming increase in the number of reports of schools being militarized, being used as barracks and detachments in the course of the Aquino government counter insurgency campaign.</p>
              <p class="con-p">This recurring child rights violations gave birth to the Save Our Schools network.</p>
              <p class="con-p"><b>The Save our schools Network is a network of child rights advocates, organizations and various stakeholders working together to bring light and take action on the ongoing violation of children’s right to education, particularly those in the context of militarization and attacks on schools.</b></p>
          </div>
          </div>
          <hr>

          <div class="col-md-12">
            <div class="contact-us">
                  <p class="con-p">
                    For more information about the campaign, you may get in touch through:
                  </p>
                  <p class="con-p">
                    Save Our Schools Network Secretariat c/o Salinlahi Alliance for Children’s Concerns
                  </p>
                  <p class="con-p">
                    2F 90 J Bugallon St., Brgy. Bagumbuhay, Project 4 Quezon City, Philippines 1109
                  </p>
                  <p class="con-p">
                    Tel no.: (+632) 263-7789
                  </p>
                  <p class="con-p">
                    <a href="#" class="text-green">
                      <i class="fa fa-google"></i> &nbsp salinlahialliance@gmail
                    </a>
                  </p>
                  <p class="con-p">
                      <a href="https://www.facebook.com/saveourschoolsnetwork/" class="text-green">
                      <i class="fa fa-facebook-square"></i>&nbsp saveourschoolsnetworkfb</a>
                  </p>
                </div><br>
                <form>
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                    <div class="card">
                      <div class="card-header text-center">
                        <h4>Contact US</h4>
                      </div>
                      <div class="card-body">
                        <div class="row" id="registration-form">
                          <div class="col-lg-5">
                            <div class="form-group form-material">
                              <input id="name" type="text" required name="name" class="input-material">
                              <label for="name" class="label-material">Name:</label>
                            </div>
                            <div class="form-group form-material">
                              <input id="email" type="email" required name="email" class="input-material">
                              <label for="email" class="label-material">Email Address:</label>
                            </div>
                            <div class="form-group form-material">
                              <input id="phone" type="tel" required name="phone" class="input-material">
                              <label for="phone" class="label-material">Phone Number:</label>
                            </div>
                          </div>

                          <div class="col-lg-7">
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                              <label class="text-heading blurr">Message:</label>
                              <textarea class="form-control" rows="6"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                              <button type="submit" class="btn btn-sanz float-right">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                   </div> 
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>

@endsection
