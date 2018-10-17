                        <div class="follow-widget">
	                    <?
	                    $res = mysqli_query($db,'SELECT * FROM social_counter');
	                    $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
	                    ?>                        
                            <h4>FOLLOW US</h4>
                            <ul class="list-unstyled clearfix">
                                <li>
                                    <a href="">
                                        <i class="fa fa-facebook"></i>
                                        <p><span>44,410</span>fans</p>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://twitter.com/rixnews_com">
                                        <i class="fa fa-twitter"></i>
                                        <p><span><?echo number_format($row['twitter']);?></span>subscribers</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-rss"></i>
                                        <p><span>11,209</span>subscribers</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-linkedin"></i>
                                        <p><span>19,323</span>followers</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-google-plus"></i>
                                        <p><span>29,559</span>followers</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-youtube"></i>
                                        <p><span>56,717</span>subscribers</p>
                                    </a>
                                </li>
                            </ul>
                        </div>