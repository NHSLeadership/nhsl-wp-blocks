# NHS Blocks for Gutenburg

### Alpha release - this code is still in active development
This is a WordPress plugin to extend the NHS Frontend library in to the Gutenburg editor. It adds blocks to the 
editor which then display in correct markup for the NHS template to render.

Dependancies: 
 - This suite of blocks requires the NHS Front end library to be loaded. Preferably, through the 
[`Nightingale 2.0` WordPress theme](https://github.com/NHSLeadership/nightingale-2-0)

- This suite of blocks requires an active ACF Pro install. Active means the license field needs to be completed. If 
not, the editor will not have any way of connecting to the code. It wont work. Don't use ACF standard, it wont work. 
Seriously, it needs the Pro version.

## Included blocks:
 - Information card
   - Standard [non urgent care card - blue top](https://beta.nhs.uk/service-manual/styles-components-patterns/care-cards#non-urgent-care-card-blue)
   - Highlight [urgent care card - red top](https://beta.nhs.uk/service-manual/styles-components-patterns/care-cards#urgent-care-card-red)
   - Immediate ( [immediate care card - red top, dark grey panel](https://beta.nhs.uk/service-manual/styles-components-patterns/care-cards#emergency-care-card-red-and-black)):  

 - [Do and Dont List](https://beta.nhs.uk/service-manual/styles-components-patterns/do-and-dont-list) Able to make a list of either do with tick, or dont with cross.
 - [Testimonials / Quotes](https://beta.nhs.uk/service-manual/styles-components-patterns/inset-text) - expanded to 
 include inverted box option
 - [Reveal](https://beta.nhs.uk/service-manual/styles-components-patterns/details)
 - [Call Out Box](https://nhsuk.github.io/nhsuk-frontend/components/promo/index.html)
   - [Promo with no description](https://nhsuk.github.io/nhsuk-frontend/components/promo/promo-no-description.html)
   - [Promo with image](https://nhsuk.github.io/nhsuk-frontend/components/promo/promo-with-image.html)
 - [Call Out Box Group](https://nhsuk.github.io/nhsuk-frontend/components/promo/promo-group.html)
   - as individual call out box, but grouped with ability to add multiple boxes in a layout of your choice.
 - [Panel Element](https://nhsuk.github.io/nhsuk-frontend/components/panel/index.html)
   - [Panel with grey background](https://nhsuk.github.io/nhsuk-frontend/components/panel/panel-grey.html)
   - [Panel with label](https://nhsuk.github.io/nhsuk-frontend/components/panel/panel-with-label.html)
   - Added action button
 - [Panel Element Group](https://nhsuk.github.io/nhsuk-frontend/components/panel/panel-group.html)
 - [Button](https://nhsuk.github.io/nhsuk-frontend/components/button/index.html)
   - Action button - Green
   - [Secondary Button - Grey](https://nhsuk.github.io/nhsuk-frontend/components/button/secondary.html)
   - [Reverse Button - White](https://nhsuk.github.io/nhsuk-frontend/components/button/reverse.html)
 - [Hero](https://nhsuk.github.io/nhsuk-frontend/components/hero/index.html)
   - [Hero with only image](https://nhsuk.github.io/nhsuk-frontend/components/hero/hero-image.html)
   - Hero with only text
   - [Hero with both image and text](https://nhsuk.github.io/nhsuk-frontend/components/hero/hero-image-content.html)
   
 ## Installation
 
 - -**Ensure you first have ACF Pro installed and activated.**
 - It also makes sense to have the [NHS Nightingale 2.0 Theme](https://github.com/NHSLeadership/nightingale-2-0) 
  installed and active
 - Add this code to your plugins folder - you may need to rename the folder to nhsl-blocks. So all code will now be in 
 `wp-content/plugins/nhsl-blocks`
 - Activate the plugin.
 - Navigate to your admin panel, you will see Custom Fields in the left hand side. Click into this, then Field Groups. 
 You will see a list of groups. Under each one will be a link saying Sync - click this for each group
 - Edit a page or post. If you click to add a block, you will see a new list of blocks available at the bottom - NHS 
 Block Elements. Click any of these and fill in the fields.
 - When editing a page, at the bottom of the edit view is a new section "Hero Banner". Fill in these fields and 
 upload an image on pages you wish to have a hero banner showing. **The Hero Banner will not show without code in 
 your theme. Nightingale 2.0 already includes this code**
 
 ## Progress
  - [x] Add core components
  - [x] Add flexibility to each component to scale it out
  - [x] Add Hero to Page edit screen
  - [ ] `Reveal` element switcher to also use [Expander](https://beta.nhs.uk/service-manual/styles-components-patterns/expander)
  - [ ] Auto-include this repository with theme
  - [ ] Build navigation alternative to tabs (tabs being bad for UX as researched by GDS)
  - [ ] Check `information cards` settings, they dont always seem to load correctly on install.
 
2019 NHS Leadership Academy
