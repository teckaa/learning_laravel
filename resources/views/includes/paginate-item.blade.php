<hr/>
<footer>
    <a class="action-button second float-right bg-cobalt"
        href="{{ url(strtolower( $page_title ?? '' )."/create") }}">
        <ion-icon name="add-outline" class="fg-white"
            style='font-size:35px;'>
        </ion-icon>
    </a>

    {{ $collection->links() }}

</footer>

