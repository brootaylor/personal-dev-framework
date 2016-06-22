            
            <section id="forms">

                <h1>Forms</h1>

                <hr class="hr__big">

                <form class="form">
                    <fieldset>
                        <legend class="visuallyhidden">Personal details</legend>
                        <ul class="no-list form__wrap">
                            <li class="form__item">
                                <label for="fieldA" class="form__label">Text input &#8594; (<code>type="text"</code>) <abbr title="This field is mandatory" class="field--mandatory">*</abbr></label>
                                <input type="text" id="fieldA" name="text" placeholder="eg. Your first name" class="form__field" required>
                            </li>
                            <li class="form__item">
                                <label for="fieldB" class="form__label">Number input &#8594; (<code>type="number"</code>)<abbr title="This field is mandatory" class="field--mandatory">*</abbr></label>

                                <!-- An example of an <input> element with type="number". The pattern attribute is not required on the number field but it can act as a fallback for browsers which don't implement the number field but support the pattern attribute such as Firefox. Using up and down arrow keys will, in this instance, work within the "min" and "max" values - in increments defined by the "step" attribute. -->
                                <input type="number" id="fieldB" min="12" max="120" step="1" name="age" pattern="\d+" title="This field only accepts number characters" class="form__field" required>
                            </li>
                            <li class="form__item">
                                <label for="fieldC" class="form__label">Email input &#8594; (<code>type="email"</code>)<abbr title="This field is mandatory" class="field--mandatory">*</abbr></label>

                                <!-- An example of an <input> element with type="email" that must be in the following order: characters@characters.domain (characters followed by an @ sign, followed by more characters, and then a "."

                                This pattern should deal with most eventualities -->
                                <input type="email" id="fieldC" name="email" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="Make sure your email follows a format similar to characters@characters.domain" class="form__field" required>
                            </li>
                            <li class="form__item">
                                <label for="fieldD" class="form__label">Telephone input &#8594; (<code>type="tel"</code>)<abbr title="This field is mandatory" class="field--mandatory">*</abbr></label>

                                <!-- An example of an <input> element with type="tel" that should follow the UK phone number format. -->
                                <input type="tel" id="fieldD" name="telephone" pattern="^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$" title="This should follow the UK phone number format" class="form__field" required>
                            </li>
                            <li class="form__item">
                                <label for="fieldE" class="form__label">Password input &#8594; (<code>type="password"</code>)<abbr title="This field is mandatory" class="field--mandatory">*</abbr></label>

                                <!-- An example of an <input> element with type="password" that must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter -->
                                <input type="password" id="fieldE" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form__field" required>
                            </li>
                            <li class="form__item">
                                <label for="fieldF" class="form__label">URL input &#8594; (<code>type="url"</code>)</label>

                                <!-- An example of an <input> element with type="url" that must start with http:// or https:// followed by at least one character -->
                                <input type="url" id="fieldF" name="website" pattern="https?://.+" title="Include http:// or https://" class="form__field">
                            </li>
                            <li class="form__item">
                                <label></label>
                                <label for="fieldG" class="form__label">Search input &#8594; (<code>type="search"</code>)</label>

                                <!-- An <input> element with type="search" that CANNOT contain the following characters: ' or " -->
                                <input type="search" id="fieldG" name="search" pattern="[^'\x22]+" title="Make sure no single or double-quote characters are present" placeholder="eg. Lessons for cats" aria-describedby="search-tip" class="form__field">

                                <!-- Visually hidden 'tooltip' (below) for benefit of assistive technologies - especially screenreaders -->
                                <span role="tooltip" id="search-tip" class="visuallyhidden">Type something in the search box you'd like to search for</span>
                            </li>
                            <li class="form__item">
                                <label for="fieldH" class="form__label">Textarea input &#8594; (<code>&lt;textarea&gt;</code>)</label>

                                <!-- An example of a <textarea> element -->
                                <textarea id="fieldH" name="message" maxlength="140" rows="5" placeholder="eg. Tell us what your favourite instrument is" class="form__field"></textarea>
                            </li>
                            <li class="form__item">
                                <fieldset>
                                    <!-- When you want to render the <legend> -->
                                    <legend class="form__legend">What is Your Favorite Pet?</legend>
                                    <label for="fieldI" class="form__label">
                                        <input type="radio" id="fieldI" name="animal" value="Cat" class="form__field">Cats
                                    </label>
                                    <label for="fieldJ" class="form__label">
                                        <input type="radio" id="fieldJ" name="animal" value="Dog" class="form__field">Dogs
                                    </label>
                                    <label for="fieldK" class="form__label">
                                        <input type="radio" id="fieldK" name="animal" value="Monkey" class="form__field">Monkeys
                                    </label>
                                </fieldset>
                            </li>
                            <li class="form__item">
                                <fieldset>
                                    <!-- When you want to render the <legend> -->
                                    <legend class="form__legend">Which instruments do you play?</legend>
                                    <label for="fieldL" class="form__label">
                                        <input type="checkbox" id="fieldL" name="instrument" value="Drums" class="form__field">Drums
                                    </label>
                                    <label for="fieldM" class="form__label">
                                        <input type="checkbox" id="fieldM" name="instrument" value="Piano" class="form__field">Piano
                                    </label>
                                    <label for="fieldN" class="form__label">
                                        <input type="checkbox" id="fieldN" name="instrument" value="Violin" class="form__field">Violin
                                    </label>
                                </fieldset>
                            </li>
                            <li>
                                <label for="fieldO" class="form__label">What's your favourite genre?</label>

                                <!-- This wrapper <div> for the <select> element enables a pseudo element (arrow) to be added to the dropdown -->
                                <div class="field__wrap field--select">
                                    <select id="fieldO" name="genre" class="form__field">
                                        <option value="genre-all" selected>Genre (all)</option>
                                        <option value="genre-brass">Brass Band</option>
                                        <option value="genre-classical">Classical</option>
                                        <option value="genre-urban">Urban / Electronic</option>
                                        <option value="genre-world">World Music</option>
                                    </select>
                                </div>
                            </li>       
                        </ul>
                    </fieldset>
                    <input type="submit" value="Submit" class="button__primary button--rounded">
                </form>

            </section>
