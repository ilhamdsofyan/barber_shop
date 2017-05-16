<?php $this->load->view('beautyplus/header'); ?>
<body>
    
    <!-- Content -->
    <div class="content">
        <div class="title"><h5>Dashboard</h5></div>
        
                
        <!-- Charts -->
        <div class="widget first">
            <div class="head"><h5 class="iGraph">Charts</h5></div>
            <div class="body">
                <div class="chart"></div>
            </div>
        </div>
        
        <!-- Dynamic table -->
        <div class="table">
            <div class="head"><h5 class="iFrames">Dynamic table</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeX">
                        <td>Trident</td>
                        <td>Internet
                             Explorer 4.0</td>
                        <td>Win 95+</td>
                        <td class="center">4</td>
                        <td class="center">X</td>
                    </tr>
                </tbody>
            </table>
        </div>    
            
            <!-- Right widgets -->
            <div class="right">
                
                <!-- Tabs widget -->
                <div class="widget">       
                    <ul class="tabs">
                        <li><a href="#tab1">Capster</a></li>
                        <li><a href="#tab2">Customer</a></li>
                        <li><a href="#tab3">Packet</a></li>
                    </ul>
                    
                    <div class="tab_container">
                        <div id="tab1" class="tab_content">Capster Table</div>
                        <div id="tab2" class="tab_content">Customer Table</div>
                        <div id="tab3" class="tab_content">Packet Table</div>
                    </div>  
                    <div class="fix"></div>      
                </div>
            </div>
        </div>
    </div>
    <div class="fix"></div>
</div>
<?php $this->load->view('beautyplus/footer'); ?>