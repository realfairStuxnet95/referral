<div id="card_transfer">
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a">To: (Destination hospital Name)</h3>
        <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <label>Hospital Name</label>
                            <input id="hospital_name" name="hospital_name" type="text" class="md-input" disabled required="" />
                        </div>
                        <div class="uk-width-medium-1-2">
                            <label>Attending Physician Name</label>
                            <input id="physician_name" name="physician_name" type="text" class="md-input" required="" disabled />
                        </div>
                        <div class="uk-width-medium-1-2">
                            <label>Physician Phone</label>
                            <input id="physician_phone" name="physician_phone" type="number" maxlength="16" class="md-input" required="" />
                        </div>
                        <div class="uk-width-medium-1-2">
                            <label>Mode of transportation</label>
                            <select id="gender" name="gender" class="md-input" required>
                                <option value="Ambulance">Ambulance</option>
                                <option value="Private">Private</option>
                                <option value="Family">Family</option>
                            </select>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <label>Patient Phone</label>
                            <input id="phone" name="phone" type="number" class="md-input"  required>
                        </div>

            <div class="uk-width-medium-1-1" style="margin: 20px;">
                <label>To: (Destination hospital Name) </label>
                <select id="selec_adv_s2_2" name="selec_adv_s2_2" class="uk-width-1-1" data-md-select2>
                    <optgroup label="Alaskan/Hawaiian Time Zone">
                        <option value="AK">Alaska</option>
                        <option value="HI">Hawaii</option>
                    </optgroup>
                    <optgroup label="Pacific Time Zone">
                        <option value="CA">California</option>
                        <option value="NV" disabled="disabled">Nevada</option>
                        <option value="OR">Oregon</option>
                        <option value="WA">Washington</option>
                    </optgroup>
                    <optgroup label="Mountain Time Zone">
                        <option value="AZ">Arizona</option>
                        <option value="CO">Colorado</option>
                        <option value="ID">Idaho</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NM">New Mexico</option>
                        <option value="ND">North Dakota</option>
                        <option value="UT">Utah</option>
                        <option value="WY">Wyoming</option>
                    </optgroup>
                    <optgroup label="Central Time Zone">
                        <option value="AL">Alabama</option>
                        <option value="AR">Arkansas</option>
                        <option value="IL">Illinois</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="OK">Oklahoma</option>
                        <option value="SD">South Dakota</option>
                        <option value="TX">Texas</option>
                        <option value="TN">Tennessee</option>
                        <option value="WI">Wisconsin</option>
                    </optgroup>
                    <optgroup label="Eastern Time Zone">
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="IN">Indiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="OH">Ohio</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WV">West Virginia</option>
                    </optgroup>
                </select>
                <br>
                <button style="margin:10px;" id="btn_step2" class="md-btn">SAVE AND CONTINUES</button>
            </div>
        </div>
                
    </div>
</div>
</div>