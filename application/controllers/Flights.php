<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Flights extends Application {
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $role = $this->session->userdata('userrole');

        $this->data['flights'] = $this->flight->all();
        $this->data['pagetitle'] = 'Scheduled Flights ('. $role . ')';
        $this->data['pagebody'] = 'flights';
        if ($role == ROLE_OWNER){
            $this->data['pagination'] = $this->parser->parse('itemadd',[], true);
            $this->data['pagebody'] = 'flightadmin';
        }else{
           // $this->data['pagination'] = $this->parser->parse('emptydiv',[], true);
            $this->data['pagebody'] = 'flightsx';
        }
        $this->render();
    }

    public function add()
    {
        $role = $this->session->userdata('userrole');

        $this->data['pagetitle'] = 'Add New Schedule ('. $role . ')';

        $newflight = $this ->flight->create();
        // var_dump($newflight);
        // return;

        $this->session->set_userdata('flight', (object) $newflight);
        $this->showit();
    }

    public function edit($id)
    {
        if ($id == null) {
            redirect('/flights');
        }
        if ($this->session->userdata('userrole') != ROLE_OWNER) {
            redirect('/flights');
        }
        $role = $this->session->userdata('userrole');

        $flight = $this->flight->get($id);

        /*set pagetitle to the id of the plane.*/
        $this->data['pagetitle'] = $flight->id;

        $this->session->set_userdata('flightedit', $flight);
        $this->editshowit();
    }
    
    public function submit()
    {

        //TODO: validate 

        // setup for validation
        // retrieve & update data transfer buffer
        $pa = (array) $this->session->userdata('flight');
        $pa = array_merge($pa, $this->input->post());
        $pa = (object) $pa;  // convert back to object
        $this->session->set_userdata('flight', (object) $pa);

        //var_dump($pa);
        //var_dump($this->flight->highest());
        $newindex = substr($this->flight->highest(),3) + 1;
        $pa->id =  "U00" . $newindex;
        $pa->key = $pa->id;

        // var_dump($pa);
        // return;
        
        $this->flight->add($pa);

        redirect('/flights');
    }
    //show for add
    private function showit()
    {
        $this->load->helper('form');
        $pa = $this->session->userdata('flight');
        $this->data['id'] = $pa->id;
        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';
        //airport
            $options = array(
                              'YYD'  => 'YYD',
                              'YPZ'    => 'YPZ',
                              'YDL'   => 'YDL',
                              'ZST' => 'ZST',
                            );
        $fields = array(
            'id'  => form_label('Plane id: ') . form_dropdown('planeId',$this->fleet->allid(),$pa->planeId,['class' => 'form-control']),
            'fdepartureAirport'  => form_label('Departure Airport') . form_dropdown('departureAirport', $options, $pa->departureAirport,['class' => 'form-control']),
            'fdepartureTime'  => form_label('Departure Time') . form_input('departureTime', $pa->departureTime,['class' => 'form-control']),
            'farrivalAirport'  => form_label('Arrival Airport') . form_dropdown('arrivalAirport', $options, $pa->arrivalAirport,['class' => 'form-control']),
            'farrivalTime'  => form_label('Arrival Time') . form_input('arrivalTime', $pa->arrivalTime,['class' => 'form-control']),
            'fsubmit'    => form_submit('submit', 'Add flight',['class' => 'btn btn-primary btn-lg btn-block'])
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'addflights';
        $this->render();
    }

    public function delete($id) 
    {
        if ($id == null) {
            redirect('/flights');
        }
        if ($this->session->userdata('userrole') != ROLE_OWNER) {
            redirect('/flights');
        }
        if(!$this->flight->exists($id)) {
            redirect('/flights');
        }

        $current = $this->flight->get($id);  
        if ($current != NULL) 
            $this->flight->delete($id);
        redirect('/flights');
    }

    function cancel() {
        $this->session->unset_userdata('flight');
        redirect('/flights');
    }

    

    function canceledit() {
        $this->session->unset_userdata('flightedit');
        redirect('/flights');
    }

    //show for edit
    private function editshowit()
    {
        $this->load->helper('form');
        $pa = $this->session->userdata('flightedit');
        $this->data['id'] = $pa->id;
        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';
        //airport
            $options = array(
                              'YYD'  => 'YYD',
                              'YPZ'    => 'YPZ',
                              'YDL'   => 'YDL',
                              'ZST' => 'ZST',
                            );
        $fields = array(
            'id'  => form_label('Plane id: ') . form_dropdown('planeId',$this->fleet->allid(),$pa->planeId,['class' => 'form-control']),
            'fdepartureAirport'  => form_label('Departure Airport') . form_dropdown('departureAirport', $options, $pa->departureAirport,['class' => 'form-control']),
            'fdepartureTime'  => form_label('Departure Time') . form_input('departureTime', $pa->departureTime,['class' => 'form-control']),
            'farrivalAirport'  => form_label('Arrival Airport') . form_dropdown('arrivalAirport', $options, $pa->arrivalAirport,['class' => 'form-control']),
            'farrivalTime'  => form_label('Arrival Time') . form_input('arrivalTime', $pa->arrivalTime,['class' => 'form-control']),
            'fsubmit'    => form_submit('submit', 'Update flight',['class' => 'btn btn-primary btn-lg btn-block'])
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'editflights';
        $this->render();
    }

        public function editsubmit()
    {

        //TODO: validate 

        // setup for validation
        // retrieve & update data transfer buffer
        $pa = (array) $this->session->userdata('flightedit');
        $pa = array_merge($pa, $this->input->post());
        $pa = (object) $pa;  // convert back to object
        $this->session->set_userdata('flightedit', (object) $pa);
        
        $this->flight->update($pa);

        redirect('/flights');
    }


}