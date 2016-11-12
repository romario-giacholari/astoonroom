
       
        
          {{csrf_field()}}
          <div class="form-group">
            <label for="Title">Ad title</label>
            <input required type="text" class="form-control" id="title" name = 'title'  placeholder="Enter a title">
            <small  class="form-text text-muted">make it as unique as possible.</small>
          </div>
          <div class="form-group">
            <label for="Title">Contact info</label>
            <input type="text" class="form-control" id="contact" name = 'contact'  placeholder="Optional">
            <small  class="form-text text-muted">If you want to make it easier for others to reach you, provide your contact info. Notice that the contact info will be public to all members!</small>
          </div>
           <div class="form-group">
            <label for="Location">Property location</label>
            <select class="form-control" id="location" name = 'location'>
                <option>Lakeside</option>
                <option>William Murdoch</option>
                <option>James Watt</option>
                <option>Harriet Martineau</option>
                 <option>Mary Sturge</option>
              </select>
            <small  class="form-text text-muted">Provide the location of the accommodation</small>
          </div>
          <div class="form-group">
            <label for="Gender">Gender</label>
            <select class="form-control" id="gender" name = 'gender'>
                <option>Male</option>
                <option>Female</option>
              </select>
          </div>
            <div class="form-group">
            <label for="Year">Year of study</label>
            <select class="form-control" id="year" name = 'year'>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
          </div>
          <div class="form-group">
            <label for="exampleTextarea">Description</label>
            <textarea maxlength=255" required class="form-control" id="body" name ='body' rows="5"></textarea>
            <small  class="form-text text-muted">Clear and thorough description of your room, availability etc.</small>
         </div>
         
         <!--<div class="form-group">
          <label for="example-color-input" class="col-xs-2 col-form-label">Ad color</label>
            <input class="form-control" type="color" value="#D3D3D3" name = 'color' id="color">
            <small  class="form-text text-muted">Optional.</small>
         </div>
         -->
         <button type="submit" class="btn btn-primary" style = 'margin-bottom:20px; width:100%'>{{$submitButton}}</button>
       
        </div>
