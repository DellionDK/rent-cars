@extends('landing.layouts.oferta')
@section('preview_image', asset('/assets/landing/logo.webp'))

@if(app()->getLocale() == "en")
    @section('title', 'Rent Mercedes (Kiev) Rent with or without driver | arenda-mercedes.kiev.ua')
@section('description', 'Rent a Mercedes in Kiev and the region ✅ All classes Mercedes V, G, E, S-class ✅ Rent with a driver and without ✅ Car supply 100% ✅ VIP service 24/7 ✅ English-speaking drivers ⭐Favorable prices ➢Order ☎ 067 708-50-88')
@section('keywords', 'rent a Mercedes, rent a Mercedes s, rent a mercedes, rent a Mercedes with a driver, rent a Mercedes, rent a mercedes, order a Mercedes, a Mercedes for a wedding, a Mercedes wedding, rent a Mercedes for a wedding, a white Mercedes, a white Mercedes for a wedding, order a Mercedes for a wedding, a Mercedes 222 for a wedding, rent a Mercedes for a wedding, a Mercedes sprinter for a wedding, a Mercedes car for a wedding, rent a Mercedes 222 with a driver, rent a Mercedes 221 with a driver, rent a Mercedes 222, rent a Mercedes 221, rent a Mercedes sprinter, a Mercedes taxi, a Mercedes taxi, Chauffeur services, Chauffeur driven Mercedes, Car for hire, mercedes rental, rent mercedes, hire a mercedes, mercedes for rent, order mercedes, white mercedes, mercedes wedding, mercedes taxi, Rent Mercedes sprinter, airport transfer')
@else
    @section('title', 'Аренда Mercedes (Киев) Прокат с водителем и без | arenda-mercedes.kiev.ua')
@section('description', 'Аренда Mercedes Киев и обл ✅ Все классы Мерседес V,G,E, S-class ✅ Прокат с водителем и без ✅ Подача авто 100% ✅ VIP сервис 24/7 ✅ Англоговорящие водители ⭐Выгодные цены ➢Заказать ☎ 067 708-50-88')
@section('keywords', 'аренда мерседеса, аренда мерседеса, аренда мерседеса, аренда мерседеса с водителем, аренда мерседеса, аренда мерседеса, заказать мерседес, мерседес на свадьбу, мерседес на свадьбу, аренда мерседеса на свадьбу, белый мерседес, белый мерседес на свадьбу, заказать мерседес на свадьбу, мерседес 222 на свадьбу, аренда мерседес на свадьбу, мерседес спринтер на свадьбу, автомобиль мерседес на свадьбу, аренда мерседес 222 с водитель, аренда мерседес 221 с водителем, аренда мерседес 222, аренда мерседес 221, аренда мерседес спринтер, мерседес такси, мерседес такси, услуги шофера, мерседес с водителем, прокат автомобилей, аренда мерседес, аренда мерседес , аренда мерседеса, аренда мерседеса, заказ мерседеса, белый мерседес, мерседес свадьба, мерседес такси, Аренда мерседес спринтер, трансфер из аэропорта')
@endif

@section('content')
    <section id="oferta">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center black">PUBLIC AGREEMENT (Offer)</h2>
                    <p>
                        This agreement is an official and public seller’s offer to conclude a sales agreement of Goods presented on the website https://arenda-mercedes.kiev.ua. This is a public contract, according to article 633 of the Civil Code of Ukraine, its conditions are the same for all buyers, regardless of their status (physical person, legal entity, a natural person-entrepreneur). By signing this Agreement the buyer fully accepts the terms and conditions of the order, payment, delivery of goods, return of goods, liability for bad order and all other terms of the contract. The contract is considered to be concluded from the moment when the Buyer clicks the "Confirm Order" button on the ordering page in the "Product Card" section and receives the order confirmation form from the Seller.
                    </p>
                </div>
                <div class="block-oferta-content">
                    <div class="terminy">
                            <h4 class="oferta-title">1. Definition of terms</h4>
                            <pre class="oferta-descr">
                                1.1. The public offer (hereinafter - the "Offer") - the Seller's public offer, addressed to the indefinite circle of persons, to conclude the agreement for sale of goods remotely  (hereinafter - the "Agreement") with the Seller on conditions, contained in the Offer.
                                1.2. Product or Service - the object of the parties' agreement, which was chosen by the buyer on the website of online store and placed in the cart, or already purchased by the Buyer from the Seller remotely.
                                1.3. Online store - the Seller's website
                                (https://arenda-mercedes.kiev.ua) is created for concluding contracts of retail and wholesale purchase on the basis of the Buyer's familiarization with the description of Goods offered by the Seller using the Internet.
                                1.4. Buyer - a legally capable individual or a legal entity or an individual entrepreneur over 18 years old, receives information from the Seller, places an order for the purchase of goods, which are presented on the Store's website for purposes not related to entrepreneurial activities.
                                1.5. Seller - an individual entrepreneur Dmitry Shtrom (identification code 2929908710), a legal entity that is established and operates in accordance with the laws of Ukraine, its location is located in Kiev, Degtyarevskaya street, 11v.
                            </pre>
                    </div>
                    <div class="terminy">
                        <h4 class="oferta-title">2. Subject-matter of the Agreement</h4>
                        <pre class="oferta-descr">
                            2.1. Seller undertakes to transfer Product (Service) to Buyer, and Buyer undertakes to pay and accept the Product (Service) according to the terms and conditions of this Agreement
                            2.2. The date of the agreement conclusion (acceptance of the offer) and the moment of full and unconditional acceptance of the conditions of the Agreement by the Buyer shall be the date when the Buyer fills the order form on the website of the Online Store, provided that the Buyer received the order confirmation from the Seller electronically. If necessary, at the Buyer's request, the Agreement may be executed in writing.
                        </pre>
                    </div>
                    <div class="terminy">
                        <h4 class="oferta-title">2. Subject-matter of the Agreement</h4>
                        <pre class="oferta-descr">
                            2.1. Seller undertakes to transfer Product (Service) to Buyer, and Buyer undertakes to pay and accept the Product (Service) according to the terms and conditions of this Agreement
                            2.2. The date of the agreement conclusion (acceptance of the offer) and the moment of full and unconditional acceptance of the conditions of the Agreement by the Buyer shall be the date when the Buyer fills the order form on the website of the Online Store, provided that the Buyer received the order confirmation from the Seller electronically. If necessary, at the Buyer's request, the Agreement may be executed in writing.
                        </pre>
                    </div>
                    <div class="terminy">
                        <h4 class="oferta-title">3. Ordering</h4>
                        <pre class="oferta-descr">
                           3.1. The Buyer independently places an order on the site through the form "Book a car" in the Product Card (Vehicles) or by placing an order by e-mail or by phone, specified in the contact section of the Online store.
                            3.2. The Seller has the right to refuse to transfer the order to the Buyer in case the information provided by the Buyer is incomplete or raises suspicion about its validity.
                            3.3. When placing an order on the website of the online store, the Buyer shall provide the following mandatory information required by the Seller to fulfill the order:
                            3.3.1. Buyer's last name, first name;
                            3.3.2. Address where the product should be delivered
                            3.3.3. Contact phone number.
                            3.3.4. IDcode for the legal entity or individual entrepreneur.
                            3.4. The name, quantity, article number, price of the Product chosen by the Buyer are indicated in the Buyer's basket on the site of online store.
                            3.5. If either Party needs additional information, it has the right to request it from the other Party. In case the Buyer fails to provide the necessary information, the Seller shall not be liable for the provision of quality service to the Buyer when purchasing goods (services) at the online store.
                            3.6. When placing order by phone (paragraph 3.1 of this Offer) the Buyer shall provide the information specified in paragraphs 3.3. - 3.4. of this Offer.
                            3.7. The Buyer's acceptance of the terms and conditions of this Offer shall be made by entering by the Buyer the relevant data in the registration form on the Online store's website or when placing an Order by phone. After placing Order through the Operator, the Buyer's data shall be entered into the Seller's database.
                            3.8. The Buyer shall be responsible for the accuracy of the information provided when placing an Order.
                            3.9. By concluding the Agreement, i.e. accepting the terms and conditions of this offer (the offered conditions for the purchase of Goods (Service), by placing an Order, the Buyer confirms the following:
                            a) the Buyer is fully acquainted with the terms of this proposal (offer)
                            b) he gives permission to collect, process and transfer personal data, the permission to process personal data is valid for the duration of the Agreement, as well as for an unlimited period of time after its expiration. Moreover, by signing the contract the Buyer confirms that he/she is notified (without further notice) about the rights specified in the Law of Ukraine On Personal Data Protection, about the purpose of the personal data collection, as well as that his/her personal data will be provided to the Seller in order to perform the terms of the Agreement, possibility to perform mutual settlements, as well as to receive bills, statements and other documents. The Buyer also agrees that the Seller has the right to provide access and transfer his personal data to third parties without any additional communication from the Buyer in order to fulfill the Buyer's order. The scope of the Buyer's rights as a subject of personal data in accordance with the Law of Ukraine "On Protection of Personal Data" is known and understood.
                        </pre>
                    </div>

                    <div class="terminy">
                        <h4 class="oferta-title">4. Price and delivery of Goods</h4>
                        <pre class="oferta-descr">
                             4.1. Prices for goods and services shall be determined by the Seller independently and are listed on the website of the online store. All prices for goods and services are listed on the website in UAH including VAT.
                            4.2. The prices for goods and services can be changed by the Seller unilaterally depending on the market conditions. At the same time, the price of an individual unit of Goods, the price of which has been paid in full by the Buyer, may not be unilaterally changed by the Seller.
                            4.3. The cost of Goods specified on the website of the Online Store does not include the cost of delivery of Goods to the Buyer. The Buyer pays the cost of Goods delivery according to the current tariffs of delivery services (carriers) directly to the delivery service (carrier) selected by the Buyer.
                            4.4. The cost of Goods which is specified on the website of the Online Store does not include the cost of delivery of Goods to the Buyer's address.
                            4.5. The Seller may indicate the approximate delivery cost of the Goods to the Buyer when the Buyer makes a request to the Seller by sending an e-mail or when placing an order through the operator of the online store.
                            4.6. The Buyer's obligations to pay for the Commodities are considered fulfilled from the moment the Seller receives funds on his account.

                        </pre>
                    </div>

                    <div class="terminy">
                        <h4 class="oferta-title">5. Rights and obligations of the Parties</h4>
                        <pre class="oferta-descr">
                             5.1. The Seller is obliged:
                            5.1.1. Provide the Buyer with goods (service) in accordance with the terms of this Agreement and the Buyer's order.
                            5.1.2. not disclose any private information about the Buyer and not provide access to this information to third parties, except as required by law and when executing the Buyer's Order.
                            5.2. Seller has the right:
                            5.2.1 To change the terms of this Agreement, as well as the prices of goods and services unilaterally by posting them on the website of the online store. All changes come into force from the moment of their publication.
                            5.3. The Buyer undertakes:
                            5.3.1. By the time of entering into the Agreement, read the contents of the Agreement, the terms of the Agreement, and the prices offered by the Seller on the Online Store's website.
                            5.3.2. In fulfilling the Seller's obligations to the Buyer, the latter shall provide all the necessary data, unambiguously identifying him as a Buyer, and sufficient for the delivery of the ordered goods to the Buyer.

                        </pre>
                    </div>

                    <div class="terminy">
                        <h4 class="oferta-title">6. Return of Goods</h4>
                        <pre class="oferta-descr">
                            6.1. The Buyer has the right to return the non-food products to the Seller. The list of goods that are not subject to return on the grounds provided in this paragraph shall be approved by the Cabinet of Ministers of Ukraine.
                            6.2. Return shall be made within 30 (thirty) calendar days from the date of receipt, subject to compliance with the requirements stipulated in paragraph. 6.1. of the Agreement, the current legislation of Ukraine.
                            6.3. The cost of goods shall be returned by bank transfer to the Buyer's account.
                            6.4. The return of Goods to the address of the Seller shall be made at the expense of the Buyer and shall not be compensated by the Seller to the Buyer.
                            6.5. If during the warranty period defects in the goods are identified, the Buyer personally, in the manner and within the terms stipulated by the legislation of Ukraine, has the right to submit to the Seller the claims provided by the Law of Ukraine "On Protection of Consumer Rights". In case of claims on uncompensated elimination of defects, the term for their elimination shall be counted from the date of receipt of Goods by the Seller at his disposal and physical access to such Goods.
                            6.6. Consideration of claims, stipulated by the Law of Ukraine "On Protection of Consumer Rights", is made by the Seller on condition that the Buyer provides the documents, stipulated by the current legislation of Ukraine. The Seller shall not be liable for any defects in the Commodities that occurred after their transfer to the Buyer due to violation by the Buyer of the rules of use or storage of the Commodities, the actions of third parties or force majeure.
                            6.7. The Buyer does not have the right to refuse the goods of proper quality, which have individually defined properties, if the said goods can be used exclusively by the Buyer, who purchased them (including at the request of the Buyer not standard dimensions, characteristics, appearance, configuration, etc.). Confirmation that the goods have individually-defined properties is the difference of product dimensions and other characteristics specified in the online store.
                            6.8. The return of goods in cases stipulated by law and this Contract is carried out at the address listed on the site in the "Contact Us" section.

                        </pre>
                    </div>

                    <div class="terminy">
                        <h4 class="oferta-title">7. Liability</h4>
                        <pre class="oferta-descr">
                            7.1. The Seller is not liable for any damage caused to the Buyer or third parties due to improper installation, use, storage of Goods purchased from the Seller.
                            7.2. The Seller is not liable for improper, untimely fulfillment of the Orders and its obligations in case the Buyer provides untrue or false information.
                            7.3. The Seller and the Buyer shall be liable for performance of their obligations in accordance with the applicable laws of Ukraine and the provisions of this Agreement.
                            7.4. The Seller or the Buyer shall be exempt from liability for full or partial non-fulfillment of their obligations, if non-fulfillment is a consequence of force majeure circumstances such as: war or military actions, earthquake, flood, fire and other natural disasters, which occurred independently of the seller and/or the buyer after conclusion of this contract. The Party that cannot fulfill its obligations shall immediately notify the other Party.

                        </pre>
                    </div>

                    <div class="terminy">
                        <h4 class="oferta-title">8. Confidentiality and protection of personal data.</h4>
                        <pre class="oferta-descr">
                            8.1. By providing his personal data on the website of the online store when registering or placing an order, the Buyer gives the Seller his voluntary consent to the processing, use (including the transfer) of his personal data, as well as to perform other actions provided by the Law of Ukraine "On Protection of Personal Data", without limitation of duration of such consent.
                            8.2. The Seller is obliged not to disclose the information received from the Buyer. It is not considered a violation to provide information by the Seller to counterparties and third parties acting on the basis of agreement with the Seller, as well as in cases where the disclosure of such information is required by the current legislation of Ukraine.
                            8.3. The Buyer shall be responsible for keeping its personal data up to date. The Seller shall not be liable for poor performance or failure to perform its obligations due to irrelevance of the Buyer's information or its inconsistency with reality.
                        </pre>
                    </div>

                    <div class="terminy">
                        <h4 class="oferta-title">9. Other terms and conditions</h4>
                        <pre class="oferta-descr">
                            9.1. This contract is concluded on the territory of Ukraine and is valid in accordance with the current legislation of Ukraine.
                            9.2. All disputes arising between the Buyer and the Seller shall be resolved through negotiations. If the dispute is not resolved by negotiations, the Buyer and/or the Seller have the right to apply for resolution of the dispute to the judicial authorities in accordance with the current legislation of Ukraine.
                            9.3. The Seller has the right to make changes to this Agreement unilaterally in accordance with paragraph 5.2.1. of the Agreement. In addition, the Agreement may also be amended by mutual consent of the Parties in the manner prescribed by the current legislation of Ukraine.

                        </pre>
                    </div>
                </div>

                <div class="block-adress-oferta">
                    <h5>ADDRESS AND DETAILS OF THE SELLER:</h5>
                    <span>Natural person-entrepreneur</span>
                    <span>Dmytro Shtrom</span>
                    <span>04119, Kyiv, Degtyarevskaya str.</span>
                    <span>UA303220010000026002310003336</span>
                    <span>UNIVERSAL BANK</span>
                    <span>ID code: 2929908710</span>
                </div>

            </div>
        </div>
    </section>
@endsection